<main class="form-signin w-100 m-auto">
    <form action="/" method="POST">
        <h1 class="h3 mb-3 fw-normal">Пожалуйста, войдите</h1>

        <?php
        if (isset($data['error'])) {
        ?>
            <div class="alert alert-danger" role="alert"><?php echo (isset($data['error']) ? $data['error'] : '') ?></div>

        <?php
        }
        ?>

        <div class="form-floating">
            <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" value="<?php echo (isset($data['email']) ? $data['email'] : '') ?>">
            <label for="floatingInput">Электронная почта</label>
        </div>
        <div class="form-floating">
            <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" value="<?php echo (isset($data['password']) ? $data['password'] : '') ?>">
            <label for="floatingPassword">Пароль</label>
        </div>

        <button class="btn btn-primary w-100 py-2" type="submit">Войти</button>
    </form>
</main>