import './bootstrap';

/**
 * Password strength indicator for the registration form.
 * Evaluates password length and character variety to show strength feedback.
 */
function initPasswordStrength() {
    const passwordInput = document.getElementById('password');
    const strengthDisplay = document.getElementById('passwordStrength');

    if (!passwordInput || !strengthDisplay) return;

    passwordInput.addEventListener('input', function () {
        const value = this.value;
        let strength = 0;
        let label = '';
        let color = '';

        // Evaluate password strength criteria
        if (value.length >= 6) strength++;
        if (value.length >= 10) strength++;
        if (/[A-Z]/.test(value)) strength++;
        if (/[0-9]/.test(value)) strength++;
        if (/[^A-Za-z0-9]/.test(value)) strength++;

        // Map strength score to label and color
        if (value.length === 0) {
            label = '';
        } else if (strength <= 1) {
            label = '🔴 Weak';
            color = 'text-red-600';
        } else if (strength <= 3) {
            label = '🟡 Medium';
            color = 'text-yellow-600';
        } else {
            label = '🟢 Strong';
            color = 'text-green-600';
        }

        strengthDisplay.textContent = label;
        strengthDisplay.className = 'mt-1 text-sm ' + color;
    });
}

/**
 * Client-side form validation for the registration form.
 * Checks required fields and password match before submission.
 */
function initFormValidation() {
    const form = document.getElementById('registerForm');
    if (!form) return;

    form.addEventListener('submit', function (e) {
        const password = document.getElementById('password').value;
        const confirm = document.getElementById('password_confirmation').value;

        // Check that passwords match
        if (password !== confirm) {
            e.preventDefault();
            alert('Passwords do not match. Please try again.');
            return false;
        }

        // Check minimum password length
        if (password.length < 6) {
            e.preventDefault();
            alert('Password must be at least 6 characters long.');
            return false;
        }
    });
}

// Initialize scripts when the page loads
document.addEventListener('DOMContentLoaded', function () {
    initPasswordStrength();
    initFormValidation();
});
