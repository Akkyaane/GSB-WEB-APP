<?php

function displayAlerts()
{
    try {
        if (isset($_SESSION['message'])) {
            if ($_SESSION['http_status'] == 400) {
                echo '<div class="alert alert-danger alert-dismissible fade show w-100" role="alert" data-bs-delay="{"show":0,"hide":150}">' . htmlspecialchars($_SESSION['message']) . '
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
            } else {
                echo '<div class="alert alert-success alert-dismissible fade show w-100" role="alert" data-bs-delay="{"show":0,"hide":150}">' . htmlspecialchars($_SESSION['message']) . '
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
            }
        }
    } catch (Exception $e) {
        $error = 'Erreur : ' . $e->getMessage();
        echo $error;
    }
}