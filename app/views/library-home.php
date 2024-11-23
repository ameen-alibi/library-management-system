<!DOCTYPE html>
<html class="h-full bg-white">

<head>
    <meta charset="UTF-8">
    <link href="/css/tailwind.css" rel="stylesheet">
    <title>Library Home</title>
</head>

<body class="h-full bg-gradient-to-b from-teal-50 via-blue-50 to-yellow-50 text-gray-900 flex flex-col">

    <!-- Navbar -->
    <header class="bg-white/70 backdrop-blur-md fixed top-0 w-full z-50 shadow-md">
        <div class="container mx-auto flex justify-between items-center py-4 px-6">
            <div class="text-3xl font-bold text-blue-600">MyLibrary</div>
            <nav class="flex space-x-6">
                <a href="#" class="text-blue-700 hover:text-teal-600 transition duration-300">Home</a>
                <a href="#" class="text-blue-700 hover:text-teal-600 transition duration-300">My Books</a>
                <a href="#" class="text-blue-700 hover:text-teal-600 transition duration-300">Search</a>
                <a href="#" class="text-blue-700 hover:text-teal-600 transition duration-300">Profile</a>
                <a href="#" class="px-4 py-2 bg-teal-600 text-white rounded-full shadow-lg hover:shadow-xl">Logout</a>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto mt-24 p-8 space-y-10 flex-grow">

        <!-- Search Bar -->
        <form action="/library-home" method="get">
            <div class="flex justify-center">
                <input
                    type="text"
                    name="query"
                    placeholder="Search for books..."
                    class="w-full md:w-1/2 px-4 py-2 border rounded-lg focus:outline-none focus:border-teal-600">
            </div>
        </form>
        <!-- Book Grid -->
        <div id="target-content" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
            <?php require base_path() . "\\app\\views\\partials\\book-grid.php"; ?>
        </div>
        <div class="flex justify-center mt-8 space-x-2">
            <?php if ($totalPages > 1): ?>
                <div class="flex justify-center mt-6 space-x-2">
                    <!-- Previous Button -->
                    <!-- <a href="Javascript:Void(0)" data-id=<?= $currentPage - 1 ?>
                        class="page-link px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                        Previous
                    </a> -->

                    <!-- Page Links -->
                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                        <a href="Javascript:Void(0)" data-id=<?= $i ?> id=<?= $i ?>
                            class="page-link px-4 py-2 <?= $i == $currentPage ? 'bg-teal-500 text-white' : 'bg-gray-300 text-gray-700' ?> rounded hover:bg-teal-600">
                            <?= $i ?>
                        </a>
                    <?php endfor; ?>

                    <!-- Next Button -->
                    <!-- <a href="Javascript:Void(0)" data-id=<?= $currentPage + 1 ?>
                        class="page-link px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                        Next
                    </a> -->
                </div>
            <?php endif; ?>

        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-teal-600 py-6 text-white text-center">
        <p>© 2024 MyLibrary Dashboard. All rights reserved.</p>
    </footer>

</body>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll(".page-link").forEach(link => {
            link.addEventListener("click", function(event) {
                event.preventDefault();
                const page = this.dataset.id;

                // Remove the active class from all page links
                document.querySelectorAll(".page-link").forEach(link => {
                    link.classList.remove("bg-teal-500", "text-white");
                });

                // Add active class to the clicked page
                this.classList.add("bg-teal-500", "text-white");

                // Perform the AJAX request to fetch the new content
                fetch(`/library-home?page=${page}`, {
                        method: "GET",
                        headers: {
                            "X-Requested-With": "XMLHttpRequest"
                        }
                    })
                    .then(response => response.text())
                    .then(html => {
                        // Update the content of the page
                        document.getElementById("target-content").innerHTML = html;

                        // Update the URL without reloading the page
                        history.pushState(null, '', `/library-home?page=${page}`);
                    })
                    .catch(err => console.error("Pagination Error:", err));
            });
        });
    });
</script>

</html>