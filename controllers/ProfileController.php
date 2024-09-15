<?php
// controllers/ProfileController.php

require_once BASE_PATH . 'models/Profile.php';

class ProfileController {
    private $profileModel;

    public function __construct() {
        $this->profileModel = new Profile();
    }

    public function viewDetails() {
        $userId = 1; // This would typically come from a session
        $profile = $this->profileModel->getProfile($userId);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $updateData = [
                'full_name' => $_POST['full_name'],
                'email' => $_POST['email'],
                'phone' => $_POST['phone'],
                'address' => $_POST['address'],
                'department' => $_POST['department'],
                'position' => $_POST['position']
            ];

            if ($this->profileModel->updateProfile($userId, $updateData)) {
                $message = "Profile updated successfully.";
                $profile = $this->profileModel->getProfile($userId); // Refresh profile data
            } else {
                $message = "Error updating profile.";
            }
        }

        $data = [
            'title' => 'Personal Details',
            'page' => 'personal-detail',
            'profile' => $profile,
            'message' => $message ?? null
        ];

        $this->loadView('personal-detail', $data);
    }

    private function loadView($view, $data) {
        extract($data);
        ob_start();
        include BASE_PATH . "views/pages/{$view}.php";
        $content = ob_get_clean();
        include BASE_PATH . 'views/layouts/main.php';
    }
}