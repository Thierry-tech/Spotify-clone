<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

final class UserController extends AbstractController
{
    #[Route(path: '/user', name: 'app_user_index', methods: ['GET'])]
    public function index(UserRepository $userRepository): JsonResponse
    {
        $users = $userRepository->findAll();

        $data = array_map(static fn ($user): array => [
            'id' => $user->getId(),
            'email' => $user->getEmail(),
            'display_name' => $user->getDisplayName(),
            'created_at' => $user->getCreatedAt()?->format(DATE_ATOM),
        ], $users);

        return $this->json($data);
    }

    #[Route('/user/{id}', name: 'app_user_id', methods: ['GET'])]
    public function show(int $id, UserRepository $userRepository): JsonResponse
    {
        $user = $userRepository->find($id);

        if (!$user) {
            return $this->json([
                'error' => 'Utilisateur non trouve.',
            ], 404);
        }

        return $this->json([
            'id' => $user->getId(),
            'email' => $user->getEmail(),
            'display_name' => $user->getDisplayName(),
            'created_at' => $user->getCreatedAt()?->format(DATE_ATOM),
        ]);
    }

    #[Route("/user/{id}", name: 'app_user_modification', methods: ['PATCH'])]
    public function updateUser(int $id, Request $request, UserRepository $userRepository, EntityManagerInterface $entityManager): JsonResponse
    {
        $user = $userRepository->find($id);
        if (!$user) {
            return $this->json([
                'error' => 'Utilisateur introuvable.',
            ], 404);
        }

        $data = json_decode($request->getContent(), true);
        if (!is_array($data)) {
            return $this->json([
                'error' => 'Demande non valide.',
            ], 400);
        }

        if (isset($data['email']) && $data['email'] !== '') {
            $user->setEmail($data['email']);
        }

        if (isset($data['password']) && $data['password'] !== '') {
            $user->setPassword($data['password']);
        }

        if (isset($data['display_name']) && $data['display_name'] !== '') {
            $user->setDisplayName($data['display_name']);
        }

        $entityManager->flush();

        return $this->json([
            'id' => $user->getId(),
            'email' => $user->getEmail(),
            'display_name' => $user->getDisplayName(),
            'created_at' => $user->getCreatedAt()?->format(DATE_ATOM),
        ], 200);
    }

    #[Route(path: '/user', name: 'app_user_post', methods: ['POST'])]
    public function send(Request $request, EntityManagerInterface $entityManager): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        if (!is_array($data)) {
            return $this->json([
                'error' => 'Demande invalide.',
            ], 400);
        }

        if (
            !isset($data['email'], $data['password'], $data['display_name']) ||
            $data['email'] === '' ||
            $data['password'] === '' ||
            $data['display_name'] === ''
        ) {
            return $this->json([
                'error' => 'Missing required fields: email, password, display_name.',
            ], 400);
        }

        $user = new User();
        $user->setEmail($data['email']);
        $user->setPassword($data['password']);
        $user->setDisplayName($data['display_name']);
        $user->setCreatedAt(new \DateTimeImmutable());

        $entityManager->persist($user);
        $entityManager->flush();

        return $this->json([
            'id' => $user->getId(),
            'email' => $user->getEmail(),
            'display_name' => $user->getDisplayName(),
            'created_at' => $user->getCreatedAt()?->format(DATE_ATOM),
        ], 201);
    }
    
}
