<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('backend/assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Travel Sall</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-home'></i>
                </div>
                <div class="menu-title">Travel Package</div>
            </a>
            <ul>
                <li> <a href="{{ route('travel.index') }}"><i class="bx bx-right-arrow-alt"></i>All Travel</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-category'></i>
                </div>
                <div class="menu-title">Image</div>
            </a>
            <ul>
                <li> <a href="{{ route('image.index') }}"><i class="bx bx-right-arrow-alt"></i>Image travel</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-category'></i>
                </div>
                <div class="menu-title">Transaction Menu</div>
            </a>
            <ul>
                <li> <a href="{{ route('transaction.index') }}"><i class="bx bx-right-arrow-alt"></i>All Transaction
                        Category</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-cart'></i>
                </div>
                <div class="menu-title">Product Menu</div>
            </a>
            <ul>
                <li> <a href="#"><i class="bx bx-right-arrow-alt"></i>All Product</a>
                </li>
            </ul>
        </li>

        <li class="menu-label">Manage User</li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-message'></i>
                </div>
                <div class="menu-title">User Active & Inactive</div>
            </a>
            <ul>
                <li> <a href="#"><i class="bx bx-right-arrow-alt"></i>Inactive Vendor</a>
                </li>
                <li> <a href="$"><i class="bx bx-right-arrow-alt"></i>Active Vendor</a>
                </li>
            </ul>
        </li>

    </ul>
    <!--end navigation-->
</div>
