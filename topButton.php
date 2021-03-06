<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

    <a href="http://localhost/main.php" style="text-decoration:none;">
        <img src="/img/ticket.png" width="20%" height="20%">
        <font color="white" size="6"><b>海大資工購票網</b></font>
    </a>

    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 position-absolute top-50 start-50 translate-middle">
                <li class="nav-item">
                    <a class="navbar-brand" aria-current="page" href="http://localhost/main.php"><span class="h3 mx-1"><b>
                                首頁
                            </b></span></a>
                </li>

                <li class="nav-item">
                    <a class="navbar-brand" aria-current="page" href="http://localhost/News.php"><span class="h3 mx-1"><b>
                                公告
                            </b></span></a>
                </li>

                <li class="nav-item dropdown">
                    <a class="navbar-brand dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><span class="h3 mx-1"><b>
                                活動資訊
                            </b><span class="h3 mx-1"></a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="http://localhost/newEvent.php">舉辦活動</a></li>
                        <li><a class="dropdown-item" href="http://localhost/listEvents.php">查看所有活動</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">查看已購票的活動</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="navbar-brand" aria-current="page" href="http://localhost/login.php"><span class="h3 mx-1"><b>
                                登入
                            </b></span></a>
                </li>

                <li class="nav-item">
                    <a class="navbar-brand" aria-current="page" href="http://localhost/createAccount.php"><span class="h3 mx-1"><b>
                                註冊
                            </b></span></a>
                </li>

            </ul>

            <form class="d-flex position-absolute top-50 end-0 translate-middle-y">
                <input class="form-control me-2" type="search" placeholder="輸入關鍵字" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            
        </div>


    </div>
</nav>

<?php include "session.php"; ?>

<!-- Bootstrap JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>