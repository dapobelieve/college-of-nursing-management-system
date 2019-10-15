# College of Nursing & Midwifery Management System

This is the Laravel app for the Oyo state College of Nursing & Midwifery Student Management System

## Setup
- Clone the repository
`https://github.com/dapobelieve/college-of-nursing-management-system`
- Install the project's dependencies
`composer install`
- Create a `.env` file and copy the contents of the `.env.example` into it. Or run:

Linux:
```bash
cp .env.example .env
```

Windows:
```shell
xcopy .env.example .env
```
- Setup your Databse credentials 
- Run migration
`php artisan migrate`
- Run the databse seeder
`php artisan db:seed`



## Template
The Dashboard template is located at `public/dashboard`. It's a complete template with all the needed assets and you can just open up the `index.php` file to view it.
