<header id = "main-header">
        <div class = "name">
            <a href="/" >
                <img src="{{ asset('images/logo.jpg') }}" alt="University Logo" class = "logo-img">
            </a>
        </div>

        <div class = "navleft">
            <ul>
                <li><a href="">About</a></li>
                <li><a href="">Contact Us</a></li>
                <li><a href="">Help</a></li>
            </ul>
        </div>

        <div class = "navright">
            <ul>
                <li>
                    
            @auth
                <span class = "name text-sm">Hi, {{ auth()->user()->name }}!</span>
                <form action="/logout" class = "inline" method = "POST">
                    @csrf
                    <button type = "submit" class = "btn btn-ghost">Log Out</button>
                </form>
            @else
                <a href = "{{ route('register') }}" class = "btn-secondary">Register</a>
                <a href = "{{ route('login') }}" class = "btn-primary">Log In</a>
            @endauth
                </li>
            </ul>

        </div>
    </header>
<style>

    #main-header{
        width: 100%;
        height: 80px;
        overflow:hidden;
        background-color: #ffffff;
        display: flex;
        justify-content: space-between;
    }

    .logo-img {
        height: 50px;
        width: auto;
        display: block;
        object-fit: contain;
    }

    #main-header .navleft{
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    }

    #main-header .navright{
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    }

    #main-header ul {
        height: 80px;
        overflow: hidden;
    }

    #main-header li{
        display: inline;
        color: #007dc4;

    }

    #main-header a{
        text-decoration: none;
        font-size: 18px;
        padding-right:10px;
    }

    #main-header a:hover{
        color: #000000;
    }

    .name {
        color: #007dc4;
    }

    .inline {
        display: inline;
    }
    
    .btn-primary {
            color: #007dc4;
            border: 2px solid #007dc4;
            padding: 0.75rem 3rem;
            border-radius: 30px;
            font-weight: 500;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
            cursor: pointer;
        }

            .btn-primary:hover {
                border: 2px solid #000000;
                background-color: #4896c3;
            }

        .btn.btn-ghost {
            color: #007dc4;
            border: 2px solid #007dc4;
            padding: 0.75rem 3rem;
            border-radius: 30px;
            font-weight: 500;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
            cursor: pointer;
        }

            .btn.btn-ghost:hover {
                background-color: #4896c3;
                color: white;
            }

            
        .btn-secondary {
            color: #007dc4;
            border: 2px solid #007dc4;
            padding: 0.75rem 3rem;
            border-radius: 30px;
            font-weight: 500;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
            cursor: pointer;
        }

            .btn-secondary:hover {
                border: 2px solid #000000;
            }

</style>
