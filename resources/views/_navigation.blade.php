<!-- Navigation -->
    <nav class="navbar navbar-default ">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
            <a class="navbar-brand page-scroll" href="{{ URL::to('kolekcija') }}">Kolekcija filmova</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    
                    <li>
                        <a class="page-scroll" href="{{ URL::to('filmovi') }}">Filmovi</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="{{ URL::to('zanr') }}">Žanr</a>
                    </li>
                 
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>