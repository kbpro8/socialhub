# SocialHub Pro

SocialHub Pro is a powerful, AI-driven social media management platform designed to help you streamline your social media strategy. It allows you to connect your social media accounts, generate engaging content with AI, and schedule posts in advance.

## Features

*   **AI Content Generation**: Leverage the power of OpenAI's GPT-3.5 to create compelling social media posts on any topic.
*   **Post Scheduling**: Schedule your posts to be published at the optimal time for your audience.
*   **Multi-Account Management**: Connect and manage multiple social media accounts from a single dashboard.
*   **Subscription Plans**: Choose from a variety of subscription plans to suit your needs.
*   **User Roles**: Assign different roles to your team members, such as 'admin', 'manager', and 'contributor', to control access and permissions.

## Setup Instructions

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites

*   PHP >= 8.1
*   Composer
*   Node.js & npm
*   A database (e.g., MySQL, PostgreSQL, SQLite)

### Installation

1.  **Clone the repository:**

    ```bash
    git clone https://github.com/your-username/socialhub-pro.git
    cd socialhub-pro/socialhub-pro
    ```

2.  **Install PHP dependencies:**

    ```bash
    composer install
    ```

3.  **Install JavaScript dependencies:**

    ```bash
    npm install
    ```

4.  **Create your environment file:**

    ```bash
    cp .env.example .env
    ```

5.  **Generate an application key:**

    ```bash
    php artisan key:generate
    ```

6.  **Configure your `.env` file:**

    Update the following variables in your `.env` file with your database credentials and other necessary information:

    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=socialhub
    DB_USERNAME=root
    DB_PASSWORD=

    OPENAI_API_KEY=your-openai-api-key
    TWITTER_CLIENT_ID=your-twitter-client-id
    TWITTER_CLIENT_SECRET=your-twitter-client-secret
    TWITTER_REDIRECT_URI=http://localhost:8000/auth/twitter/callback

    STRIPE_KEY=your-stripe-key
    STRIPE_SECRET=your-stripe-secret
    ```

7.  **Run the database migrations:**

    ```bash
    php artisan migrate
    ```

8.  **Compile front-end assets:**

    ```bash
    npm run dev
    ```

9.  **Start the development server:**

    ```bash
    php artisan serve
    ```

    Your application will be available at `http://localhost:8000`.

## Usage

1.  **Register a new account.**
2.  **Connect your Twitter account** from the dashboard.
3.  **Generate AI content** by providing a topic.
4.  **Schedule a post** for a future date and time.
5.  **Subscribe to a plan** to unlock more features.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.
