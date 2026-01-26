# Vidoo Laravel 11 Installation (Hostinger Shared Hosting)

## Requirements
- PHP 8.2+
- MySQL 8+
- PHP extensions: pdo, pdo_mysql, mbstring, openssl, tokenizer, json, xml, ctype, fileinfo

## Hostinger Setup
1. Upload the project to your hosting root (e.g. `public_html`).
2. Ensure `storage/` and `bootstrap/cache/` are writable.
3. Create a MySQL database and user from the Hostinger control panel.
4. Visit `/install` in your browser and complete the 6-step installer.
5. The installer will create `storage/app/installed.lock` and block re-installation.

## Manual Payment Workflow
- Users submit payment proof uploads (handled in the dashboard flow).
- Admin approves or rejects from `Admin > Manual Payments`.
- Approval activates the subscription.

## Storage Link
After deployment, create a symbolic link if your host supports it:
```
php artisan storage:link
```
If not supported, configure your host to serve `storage/app/public` manually.

## Security Notes
- CSRF is enabled on all forms.
- Role-based middleware protects dashboards and admin routes.
- File uploads are validated and stored in `storage`.

## Installer Steps
1. Requirements check
2. Database configuration
3. App settings
4. Admin account creation
5. Migrations + seeders
6. Finish + `installed.lock`
