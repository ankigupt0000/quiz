                       <form action="../controller/UserLogin.php">
                                <fieldset>
                                        <legend>Log In Form</legend>

                                        <p>
                                        <label for="uname">User Name:</label>
                                        <input type="text" name="uname" id="uname"
                                        value="<?php if(isset($_SESSION['login_form']['uname'])) echo htmlspecialchars($_SESSION['login_form']['uname']);?>"
                                        />
                                        </p>

                                        <p>
                                        <label for="passwd">Password:</label>
                                        <input type="password" name="passwd" id="passwd" />
                                        </p>

                                        <p class="submit">
                                        <input type="submit" value="submit" />
                                        </p>

                                        <p>
                                        <span id="error">
                                        <?php if(isset($_SESSION['login_form']['m'])) echo htmlspecialchars($msg[$_SESSION['login_form']['m']]);?>
                                        </span>
                                        </p>

                                        <p>
                                        Forgot Password <a href="ForgotPassword.php">Click Here</a>
                                        </p>

                                </fieldset>
                        </form>

