<!-- Search result will be displayed in search.php -->
<form class="d-flex" id="search-menu-item" action="/" method="get"> <!-- use / instead of /wordpress for production -->
    <div class="input-group rounded-pill border border-light">
        <input
                type="text"
                class="form-control bg-transparent py-2 text-light outline-none"
                placeholder="Search..."
                aria-label="Username"
                aria-describedby="basic-addon1"
                name="s"
                value="<?php get_search_query(); ?>"
                required>
        <span class="input-group-text border-0 bg-transparent" id="basic-addon1"  >
            <button type="submit" class="btn bg-transparent border-0 p-0 m-0 text-light">
                <i class="bi bi-search"></i>
            </button>
        </span>
    </div>
</form>
