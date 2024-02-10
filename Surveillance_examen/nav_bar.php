<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Logo</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" href="index.php">رئيسة</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">بيانات</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="new_exam.php">جديد</a></li>
            <li><a class="dropdown-item" href="professeurs.php">أساتذة</a></li>
            <li><a class="dropdown-item" href="matieres.php">مواد</a></li>
            <li><a class="dropdown-item" href="salles.php">قاعات</a></li>
            <li><a class="dropdown-item" href="examens.php">إمتحانات</a></li>

          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">إسناد </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="affecter_surv.php">إسناد المراقبة للأستاذ</a></li>
            <li><a class="dropdown-item" href="matieres.php"> الحراسة لكل حصة </a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">إنتاج</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="examens.php">جداول المراقبة حسب القاعة</a></li>
            <li><a class="dropdown-item" href="examens.php">جدول المراقبة حسب الأستاذ</a></li>
            <li><a class="dropdown-item" href="matieres.php">جدول المراقبة لكل حصة</a></li>
          </ul>
        </li>

      </ul>
    </div>
    <form class="d-flex">
        <input class="form-control me-2" type="text" placeholder="بحث">
        <button class="btn btn-primary" type="button">البحث</button>
      </form>
  </div>
</nav>

