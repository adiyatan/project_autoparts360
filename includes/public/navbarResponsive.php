<style>
    .containerr {
        max-width: 768px;
        margin-left: 24px;
        margin-right: 24px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        background-color: #ffffff;
    }

    .gridd {
        display: grid;
        gap: 24px;
    }

    .headerr {
        width: 100%;
        position: fixed;
        bottom: 0;
        left: 0;
        z-index: 100;
        background-color: hsl(250, 60%, 99%);
    }

    .nav {
        max-width: 968px;
        height: 48px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 1px solid #dcdcdc;
    }

    .navi-link {
        text-align: center;
    }

    .nav-icon {
        display: block;
        margin-bottom: 8px;
    }

    .nav-label {
        display: block;
    }

    .navi-logo {
        color: #0047ab;
        font-size: 24px;
        font-weight: 600;
    }

    .navi-item {
        color: #0047ab;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        padding: 8px 16px;
        border-radius: 8px;
        transition: background-color 0.2s ease-in-out;
    }

    .navi-menu {
        position: fixed;
        bottom: -100%;
        left: 0;
        width: 100%;
        background-color: white;
        padding: 32px 24px 64px;
        box-shadow: 0 -1px 4px rgba(0, 0, 0, 0.15);
        border-radius: 24px 24px 0 0;
        transition: 2s;
        display: flex;
        flex-direction: row-reverse;
        /* Updated to reverse the order of flex items */
    }

    .navi-list {
        grid-template-columns: repeat(3, 1fr);
        gap: 32px;
        list-style: none;
        padding: 0;
        justify-content: flex-end;
        /* Added to align items to the right */
    }

    .navi-item:hover {
        background-color: #f0f0f0;
    }

    .navi-toggle {
        font-size: 18px;
        cursor: pointer;
        color: #0047ab;
        /* Updated color for the navigation toggle */
    }

    .navi-logo:hover,
    .navi-toggle:hover {
        color: #00377f;
        /* Slightly darker shade for hover effect */
    }

    @media screen and (max-width: 767px) {
        .navi-menu {
            position: fixed;
            bottom: -100%;
            left: 0;
            width: 100%;
            background-color: white;
            padding: 32px 24px 64px;
            box-shadow: 0 -1px 4px rgba(0, 0, 0, 15);
            border-radius: 24px 24px 0 0;
            transition: 2s;
        }
    }

    .navi-list {
        grid-template-columns: repeat(3, 1fr);
        gap: 32px;
        list-style: none;
        padding: 0;
    }

    .navi-link {
        display: flex;
        flex-direction: column;
        align-items: center;
        font-size: 13px;
        color: #00377f;
        font-weight: 500;
    }

    .nav-icon {
        font-size: 19px;
    }

    .navi-close {
        position: absolute;
        right: 21px;
        bottom: 8px;
        font-size: 24px;
        cursor: pointer;
        color: #00377f;
    }

    .navi-close:hover {
        color: #00377f;
    }

    .show-menu {
        bottom: 0;
    }

    @media screen and (max-width: 350px) {
        .containerr {
            margin-left: 16px;
            margin-right: 16px;
        }

        .navi-menu {
            padding: 32px 4px 63px;
        }

        .navi-list {
            column-gap: 0;
        }
    }

    @media screen and (min-width: 768px) {
        .containerr {
            margin-left: auto;
            margin-right: auto;
        }

        .section {
            padding: 96px 0 32px;
        }

        .section-subtitle {
            margin-bottom: 54px;
        }

        .headerr {
            top: 0;
            bottom: initial;
        }

        .headerr,
        .main,
        .footer-containerr {
            padding: 0 16px;
        }

        .nav {
            height: calc(48px + 24px);
            column-gap: 16px;
        }

        .nav-icon,
        .navi-close,
        .navi-toggle {
            display: none;
        }

        .navi-list {
            display: flex;
            column-gap: 32px;
        }

        .navi-menu {
            margin-left: auto;
        }
    }

    @media screen and (min-width: 1024px) {

        .headerr,
        .main,
        .footer-containerr {
            padding: 0;
        }
    }
</style>

<headerr class="headerr" id="headerr">
    <nav class="nav containerr">
        <a href="about/" class="navi-logo">AutoParts360</a>

        <div class="navi-menu" id="nav_menu">
            <ul class="navi-list gridd">
                <!-- <li class="navi-item">
                    <a href="#" class="navi-link" disabled>
                        <i class="fas fa-user nav-icon"></i> Category
                    </a>
                </li>
                <li class="navi-item">
                    <a href="#" class="navi-link" disabled>
                        <i class="fas fa-shopping-cart nav-icon"></i> Cart
                    </a>
                </li>
                <li class="navi-item">
                    <a href="#" class="navi-link" disabled>
                        <i class="fas fa-user-circle nav-icon"></i> Profile
                    </a>
                </li> -->
                <li class="navi-item">
                    <a href="login.php" class="navi-link">
                        <i class="fas fa-sign-in-alt nav-icon"></i> Log in </a>
                </li>
                <li class="navi-item">
                    <a href="regist.php" class="navi-link">
                        <i class="fas fa-user-plus nav-icon"></i> Register </a>
                </li>
            </ul>
            <i class="fas fa-times-circle navi-close" id="nav_close"></i>
        </div>

        <div class="nav-btns">
            <div class="navi-toggle" id="nav_toggle">
                <i class="fa-solid fa-table-cells-large"></i>
            </div>
        </div>
    </nav>
</headerr>

<script>
    const navMenu = document.getElementById('nav_menu');
    const navToggle = document.getElementById('nav_toggle');
    const navClose = document.getElementById('nav_close');

    if (navToggle) {
        navToggle.addEventListener('click', () => {
            navMenu.classList.add('show-menu');
        });
    }

    if (navClose) {
        navClose.addEventListener('click', () => {
            navMenu.classList.remove('show-menu');
        });
    }

    const navLink = document.querySelectorAll('.navi-link');

    function linkAction() {
        const navMenu = document.getElementById('nav_menu');
        navMenu.classList.remove('show-menu');
    }

    navLink.forEach(n => n.addEventListener('click', linkAction));
</script>