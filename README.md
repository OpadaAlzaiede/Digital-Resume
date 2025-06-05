# Single Page Digital Resume

A modern, responsive digital resume/CV application built with Laravel, featuring PDF export capabilities and easy content management through JSON configuration.

## Features

- 🎨 Clean, responsive design using Tailwind CSS
- 📱 Mobile-friendly layout
- 📄 PDF export functionality
- ⚡ Fast loading with Vite
- 🔄 Collapsible sections
- 💾 JSON-based content management
- 🎯 Easy to customize and extend

## Tech Stack

- **Framework:** Laravel 10.x
- **Frontend:** Blade Templates, Tailwind CSS
- **PDF Generation:** Laravel DomPDF
- **Asset Bundling:** Vite
- **Icons:** Font Awesome

## Local Development Setup

1. **Clone the Repository**
   ```bash
   git clone <repository-url>
   cd single_paged_digital_resume
   ```
2. **Install Dependencies
    ```bash
   composer install
   npm install
   ```
3. **Environment Setup
    ```bash
   cp .env.example .env
   php artisan key:generate
   ```
4. **Create Storage Link
    ```bash
   php artisan storage:link
   ```
5. **Build Assets
    ```bash
   npm run dev
   ```
6. **Start Development Server
    ```bash
    php artisan serve
    ```
The application will be available at http://localhost:8000

## ## Updating CV Content
1. Navigate to storage/app/public/resume.json'
2. Edit the JSON file following this structure:
```json
{
  "personal_info": {
    "name": "Your Name",
    "title": "Your Title",
    "email": "email@example.com",
    ...
  },
  "skills": {
    "technical": [...],
    "soft": [...]
  },
  ...
}
```
3. The changes will be reflected immediately on the page

## Testing
The project uses Pest PHP for testing. To run the tests:

```bash
php artisan test
```

## Deployment
For detailed deployment instructions, please refer to the Deployment Guide .

## Contributing
- Fork the repository
- Create your feature branch ( git checkout -b feature/amazing-feature )
- Commit your changes ( git commit -m 'Add some amazing feature' )
- Push to the branch ( git push origin feature/amazing-feature )
- Open a Pull Request

## License
This project is open-sourced software licensed under the MIT license .
