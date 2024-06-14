<!-- Sidebar Section -->
<aside>
    <div class="toggle">
        <div class="logo">
            <img src="{{ asset('admin/images/logo.png') }}" />
            <h2>Asmr<span class="danger">Prog</span></h2>
        </div>
        <div class="close" id="close-btn">
            <span class="material-icons-sharp"> close </span>
        </div>
    </div>

    <div class="sidebar">
        <a href="/Dashboard" id="dashboard" class="{{ Request::is('Dashboard') ? 'active' : '' }}">
            <span class="material-icons-sharp"> dashboard </span>
            <h3>Dashboard</h3>
        </a>
        <a href="/profil" id="profile" class="{{ Request::is('profil') ? 'active' : '' }}">
            <span class="material-icons-sharp">
                person_outline
            </span>
            <h3>Profile</h3>
        </a>
        <a href="postingan" id="postingan" class="{{ Request::is('postingan', 'tambahpostingan') ? 'active' : '' }}">
            <span class="material-icons-sharp">
                post_add
            </span>
            <h3>Post</h3>
            <span class="message-count">1</span>
        </a>
        <a href="paket_wisata" class="{{ Request::is('paket_wisata') ? 'active' : '' }}">
            <span class="material-icons-sharp">
                card_travel
            </span>
            <h3>Paket Wisata</h3>
        </a>
        <a href="statistik" class="{{ Request::is('statistik') ? 'active' : '' }}">
            <span class="material-icons-sharp"> insights </span>
            <h3>Statistik</h3>
        </a>

        <a href="open_trip" class="{{ Request::is('open_trip') ? 'active' : '' }}">
            <span class="material-icons-sharp">
                flight
            </span>
            <h3>Open Trip</h3>
        </a>
        <a href="iklan" class="{{ Request::is('iklan') ? 'active' : '' }}">
            <span class="material-icons-sharp">
                format_align_left
            </span>
            <h3>Iklan</h3>
        </a>
        <a href="contact" class="{{ Request::is('contact') ? 'active' : '' }}">
            <span class="material-icons-sharp">
                contacts
            </span>
            <h3>Account</h3>
        </a>
        <a href="#">
            <span class="material-icons-sharp"> logout </span>
            <h3>Logout</h3>
        </a>
    </div>
</aside>
<!-- End of Sidebar Section -->

<script>
    $(document).ready(function() {
        $("#profile").click(function() {
            $("#profile").addClass("active");
        });
    });
</script>
