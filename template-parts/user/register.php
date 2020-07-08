<div class="login">
    <h2 class="text-center">Admin Panel - Register</h2>
   
    <form action="" method="post">
        <div class="form-group">
            <input type="text" name="username" class="form-control" placeholder="Emri perdoruesit">
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Fjalekalimi">
        </div>
        <div class="form-group">
            <input type="text" name="first_name" class="form-control" placeholder="Emri">
        </div>
        <div class="form-group">
            <input type="text" name="last_name" class="form-control" placeholder="Mbiemri">
        </div>
        <div class="form-group">
            <select name="role" class="form-control">
                <option>Specifiko rolin</option>
                <option value="standard_user">User i thjeshte</option>
                <option value="admin">Admin</option>
            </select>
        </div>
        <div class="form-group">
            <input type="submit" name="register" class="form-control" value="Regjistrohu">
        </div>
    </form>
    <a href="?page=kyqu">Kyqu ne llogarine ekzistuese.</a>
</div>