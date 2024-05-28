<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <body>
    <div class="min-h-screen flex flex-col">
    <nav class="bg-zinc-800 text-white p-4 flex justify-between items-center">
        <div class="flex items-center">
            <img src="logo2.png" alt="Logo" class="h-10 w-10 mr-2" crossorigin="anonymous">
            <a class="font-semibold text-xl" href="index.php">Campus Queuing System</a>
        </div>
        <div class="hidden md:flex space-x-4">
            <a href="index.php" class="hover:text-zinc-400">Home</a>
            <a href="aboutus.php" class="hover:text-zinc-400">About Us</a>
        </div>
        <button class="md:hidden text-white focus:outline-none">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7">
                </path>
            </svg>
        </button>
    </nav>
    <div class="flex-grow flex flex-col items-center justify-center text-center p-6">
        <div class="bg-white dark:bg-zinc-900 shadow-lg rounded-lg p-6 max-w-4xl w-full">
            <h1 class="text-4xl font-bold mb-4 text-zinc-800 dark:text-white">About Us</h1>
            <p class="text-lg mb-6 text-zinc-600 dark:text-zinc-300">
                Welcome to Campus Queuing System, your number one solution for managing queues efficiently. We are dedicated to providing you the best service, with a focus on reliability, customer service, and innovation.
            </p>
            <div class="flex flex-col md:flex-row items-center space-x-0 md:space-x-6 space-y-6 md:space-y-0">
                <img src="" alt="Team" class="w-full md:w-1/2 rounded-lg" crossorigin="anonymous">
                <div>
                    <h2 class="text-2xl font-semibold mb-2 text-zinc-800 dark:text-white">Our Mission</h2>
                    <p class="text-lg mb-4 text-zinc-600 dark:text-zinc-300">
                        Our mission is to simplify the queue management process for students. We strive to create a seamless experience that reduces wait times and improves students satisfaction.
                    </p>
                    <h2 class="text-2xl font-semibold mb-2 text-zinc-800 dark:text-white">Our Team</h2>
                    <p class="text-lg text-zinc-600 dark:text-zinc-300">
                        Our team consists of dedicated sophomore college students with a passion for technology and customer service. We're enthusiastic about learning and innovating to create solutions that meet the needs of our users. Despite being at the beginning of our journey, we work tirelessly to improve our system and make a positive impact.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <?php
    include 'footer.php';
    ?>
</div>


  </body>
</html>