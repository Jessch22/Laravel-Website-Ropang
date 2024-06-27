@php
use Illuminate\Support\Facades\Auth;
@endphp

<div id="home" class="content-section">
    <header class="header">
        <div class="date"><?php echo date('l d F Y'); ?></div>
        <div class="search">
            <input type="text" placeholder="Search here...">
        </div>
    </header>
    <section class="greeting">
        <h1>Halo, {{ Auth::user()->name }}</h1>
        <p>Semua yang Anda butuhkan untuk mengelola restoran anda di sini. ^ ^</p>
    </section>

    <section class="dasboard">
        <div class="task">
            <div class="task-icon"><i class="fa-solid fa-user-plus"></i></div>
            <div class="task-info">
                <div class="task-number">46.000</div>
                <div class="task-label">Jumlah Pembeli</div>
            </div>
        </div>
        <div class="task">
            <div class="task-icon"><i class="fas fa-users icon"></i></div> 
            <div class="task-info">
                <div class="task-number">456 </div>
                <div class="task-label">Jumlah User</div>
            </div>
        </div>
        <div class="task">
            <div class="task-icon"><i class="fa-solid fa-money-bill-1-wave"></i></div>
            <div class="task-info">
                <div class="task-number">Rp.5.764.564</div>
                <div class="task-label">Total Pembayaran</div>
            </div>
        </div>
    </section>
</div>