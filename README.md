# Project Setup Guide

## Prerequisites

- PHP 8.1
- Apache
- MySQL
- Node.js & npm

## Steps to Set Up the Project

### 1. Set Root Directory

Ensure your OS is configured to set the root directory to `public`.

### 2. Create and Configure Database

1. Open phpMyAdmin.
2. Create a new database named `myapp`.
3. Import the SQL dump into the `myapp` database.

### 3. Install Tailwind CSS and Build Styles

1. Navigate to your project directory and install the necessary npm packages:

   ```sh
   npm install
   ```

2. Build the Tailwind CSS file:

   ```sh
   npm run build:css
   ```

## File Structure Overview
