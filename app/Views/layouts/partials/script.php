<!-- <script>
    function showModal() {
        var modal = new bootstrap.Modal(document.getElementById('eventModal'));
        modal.show();
    }
</script> -->

<script>
    function showModal2(sellerName, sellerPicture) {
        // Set modal content based on the clicked item
        document.getElementById('seller').innerText = 'Seller: ' + sellerName;

        // Mendapatkan base URL
        var baseUrl = '<?= base_url(); ?>';

        // Menggabungkan base URL dengan sellerPicture
        var fullSellerPictureUrl = baseUrl + 'uploads/sellers/' + sellerPicture;

        // Mengatur src dari elemen gambar
        document.getElementById('seller_picture').src = fullSellerPictureUrl;

        // Show the modal
        var myModal = new bootstrap.Modal(document.getElementById('productModal'));
        myModal.show();
    }
</script>

<script>
    function showModal3() {
        $('#imageModal').modal('show');
    }
</script>

<script>
    $(document).ready(function() {
        $(".mobile-navbar .list").click(function(event) {
            event.preventDefault(); // Mencegah perilaku default dari link

            $(".mobile-navbar .list").removeClass("active");
            $(this).addClass("active");

            // Perpindahan halaman atau tindakan lainnya
            var url = $(this).find("a").attr("href");
            // Lakukan perpindahan halaman dengan menggunakan URL dari tautan yang diklik
            window.location.href = url;
        });
    });
</script>

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
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth'
        });
        calendar.render();
    });
</script>