<section id="main" class="container">
    <div class="row">
        <div class="12u">

            <!-- Form -->
            <section class="box">
                <h3>Form</h3>
                <form method="post" action="#">
                    <div class="row uniform 50%">
                        <div class="6u 12u(mobilep)">
                            <input type="text" name="name" id="name" value="" placeholder="Name" />
                        </div>
                        <div class="6u 12u(mobilep)">
                            <input type="email" name="email" id="email" value="" placeholder="Email" />
                        </div>
                    </div>
                    <div class="row uniform 50%">
                        <div class="12u">
                            <div class="select-wrapper">
                                <select name="category" id="category">
                                    <option value="">- Category -</option>
                                    <option value="1">Manufacturing</option>
                                    <option value="1">Shipping</option>
                                    <option value="1">Administration</option>
                                    <option value="1">Human Resources</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row uniform 50%">
                        <div class="4u 12u(narrower)">
                            <input type="radio" id="priority-low" name="priority" checked>
                            <label for="priority-low">Low Priority</label>
                        </div>
                        <div class="4u 12u(narrower)">
                            <input type="radio" id="priority-normal" name="priority">
                            <label for="priority-normal">Normal Priority</label>
                        </div>
                        <div class="4u 12u(narrower)">
                            <input type="radio" id="priority-high" name="priority">
                            <label for="priority-high">High Priority</label>
                        </div>
                    </div>
                    <div class="row uniform 50%">
                        <div class="6u 12u(narrower)">
                            <input type="checkbox" id="copy" name="copy">
                            <label for="copy">Email me a copy of this message</label>
                        </div>
                        <div class="6u 12u(narrower)">
                            <input type="checkbox" id="human" name="human" checked>
                            <label for="human">I am a human and not a robot</label>
                        </div>
                    </div>
                    <div class="row uniform 50%">
                        <div class="12u">
                            <textarea name="message" id="message" placeholder="Enter your message" rows="6"></textarea>
                        </div>
                    </div>
                    <div class="row uniform">
                        <div class="12u">
                            <ul class="actions">
                                <li><input type="submit" value="Send Message" /></li>
                                <li><input type="reset" value="Reset" class="alt" /></li>
                            </ul>
                        </div>
                    </div>
                </form>

                <hr />

                <form method="post" action="#">
                    <div class="row uniform 50%">
                        <div class="9u 12u(mobilep)">
                            <input type="text" name="query" id="query" value="" placeholder="Query" />
                        </div>
                        <div class="3u 12u(mobilep)">
                            <input type="submit" value="Search" class="fit" />
                        </div>
                    </div>
                </form>
            </section>

        </div>
    </div>
</section>