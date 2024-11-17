<div class="container is-fluid mb-6">
    <h1 class="title">Users</h1>
    <h2 class="subtitle">New user</h2>
</div>

<div class="container pb-6 pt-6">
    <form class="FormAjax" action="<?php echo APP_URL; ?>app/ajax/userAjax.php" method="POST" autocomplete="off"
        enctype="multipart/form-data">
        <!-- Hidden input to indicate the module to activate controller to save data  -->
        <input type="hidden" name="module_user" value="register">

        <!-- Name, surname, username and Email -->
        <div class="columns">
            <div class="column">
                <div class="control">
                    <label>Name</label>
                    <input class="input" type="text" name="user_name" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,100}"
                        maxlength="100" required>
                </div>
            </div>
            <div class="column">
                <div class="control">
                    <label>Surname</label>
                    <input class="input" type="text" name="user_surname" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,100}"
                        maxlength="100" required>
                </div>
            </div>
            <div class="column">
                <div class="control">
                    <label>Username</label>
                    <input class="input" type="text" name="user_username" pattern="[a-zA-Z0-9._-]{3,12}" maxlength="100"
                        required>
                    <p class="help is-info">
                        The username can include letters, numbers, dots (.), underscores (_), and hyphens (-). Between 3
                        and 12 characters.
                    </p>
                </div>

            </div>
            <div class="column">
                <div class="control">
                    <label>Email</label>
                    <input class="input" type="email" name="user_email" maxlength="255">
                </div>
            </div>
        </div>

        <!-- Password -->
        <div class="columns">
            <div class="column">
                <div class="control">
                    <label>Password</label>
                    <input class="input" type="password" name="user_password_1" pattern="[a-zA-Z0-9$@.-]{7,60}"
                        maxlength="60" required>
                </div>
            </div>
            <div class="column">
                <div class="control">
                    <label>Repeat Password</label>
                    <input class="input" type="password" name="user_password_2" pattern="[a-zA-Z0-9$@.-]{7,60}"
                        maxlength="60" required>
                </div>
            </div>
        </div>

        <!-- Role -->
        <div class="columns">
            <div class="column">
                <div class="control">
                    <label>Role</label>
                    <div class="select is-fullwidth">
                        <select name="user_role"> //TODO así? pedir? requerir?
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <!-- Profile Picture -->
        <div class="columns">
            <div class="column">
                <div class="file has-name is-boxed">
                    <label class="file-label">
                        <input class="file-input" type="file" name="user_profile_picture" accept=".jpg, .png, .jpeg">
                        <span class="file-cta">
                            <span class="file-label">Choose a picture</span>
                        </span>
                        <span class="file-name">JPG, JPEG, PNG (MAX 5MB)</span>
                    </label>
                </div>
            </div>
        </div>

        <!-- Buttons -->
        <p class="has-text-centered">
            <button type="reset" class="button is-link is-light is-rounded">Clear</button>
            <button type="submit" class="button is-info is-rounded">Save</button>
        </p>
    </form>
</div>