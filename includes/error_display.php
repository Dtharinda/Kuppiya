<?php
// error_display.php
// Include this file in your header.php or index.php

function showError($message) {
    echo '<div class="error-message fixed top-4 right-4 bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded-lg shadow-lg z-50 max-w-md">
            <div class="flex items-center">
                <i class="fas fa-exclamation-circle text-red-500 mr-3 text-xl"></i>
                <div>
                    <strong class="font-bold">Error!</strong>
                    <p class="text-sm mt-1">' . htmlspecialchars($message) . '</p>
                </div>
                <button class="ml-auto text-red-500 hover:text-red-700" onclick="this.parentElement.parentElement.remove()">
                    <i class="fas fa-times"></i>
                </button>
            </div>
          </div>';
}

function showSuccess($message) {
    echo '<div class="success-message fixed top-4 right-4 bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-lg shadow-lg z-50 max-w-md">
            <div class="flex items-center">
                <i class="fas fa-check-circle text-green-500 mr-3 text-xl"></i>
                <div>
                    <strong class="font-bold">Success!</strong>
                    <p class="text-sm mt-1">' . htmlspecialchars($message) . '</p>
                </div>
                <button class="ml-auto text-green-500 hover:text-green-700" onclick="this.parentElement.parentElement.remove()">
                    <i class="fas fa-times"></i>
                </button>
            </div>
          </div>';
}
?>