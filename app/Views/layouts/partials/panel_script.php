<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php if (session()->has('alert')) : ?>
    <script>
        Swal.fire({
            icon: '<?= session('alert.type') ?>',
            title: '<?= session('alert.title') ?>',
            text: '<?= session('alert.message') ?>',
        });
    </script>
<?php endif; ?>

<script>
    // Add event listener for delete buttons
    document.querySelectorAll('.delete-category').forEach(button => {
        button.addEventListener('click', function() {
            // Get category ID
            const categoryId = this.getAttribute('data-id');

            // Show Sweet Alert confirmation
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect to delete route
                    window.location.href = '<?= base_url("panel/cat_news/delete/") ?>' + categoryId;
                }
            });
        });
    });
</script>

<script>
    // Add event listener for delete buttons
    document.querySelectorAll('.delete-user').forEach(button => {
        button.addEventListener('click', function() {
            // Get user ID
            const userId = this.getAttribute('data-id');

            // Show Sweet Alert confirmation
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect to delete route
                    window.location.href = '<?= base_url("panel/users/delete/") ?>' + userId;
                }
            });
        });
    });
</script>

<script>
    // Add event listener for delete buttons
    document.querySelectorAll('.delete-category').forEach(button => {
        button.addEventListener('click', function() {
            // Get category ID
            const categoryId = this.getAttribute('data-id');

            // Show Sweet Alert confirmation
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect to delete route for product category
                    window.location.href = '<?= base_url("panel/cat_product/delete/") ?>' + categoryId;
                }
            });
        });
    });
</script>

<script>
    // Add event listener for delete buttons
    document.querySelectorAll('.delete-seller').forEach(button => {
        button.addEventListener('click', function() {
            // Get seller ID
            const sellerId = this.getAttribute('data-id');

            // Show Sweet Alert confirmation
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect to delete route for seller
                    window.location.href = '<?= base_url("panel/seller/delete/") ?>' + sellerId;
                }
            });
        });
    });
</script>

<script>
    // Add event listener for delete buttons
    document.querySelectorAll('.delete-news').forEach(button => {
        button.addEventListener('click', function() {
            // Get news ID
            const newsId = this.getAttribute('data-id');

            // Show Sweet Alert confirmation
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect to delete route for news
                    window.location.href = '<?= base_url("panel/news/delete/") ?>' + newsId;
                }
            });
        });
    });
</script>