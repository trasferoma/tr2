<section id="main" class="container">
    <div class="row">
        <div class="12u">
            <section class="box" id="book">
                <h3>Book your shuttle now</h3>

                <form method="post" action="#">
                    <div class="row uniform 50%">
                        <div class="6u 12u(mobile)" id="locationField">
                            <input type="text" id="autocomplete" value="" placeholder="Pick up" />
                        </div>
                        <div class="6u 12u(mobile)">
                            <input type="text" name="destination" id="destination" value="" placeholder="Destination" />
                        </div>
                    </div>

                    <div class="row uniform 50%">
                        <div class="6u 12u(mobile)">
                            <input type="text" id="datepicker" placeholder="Date" />
                        </div>
                        <div class="6u 12u(mobile)">
                            <div class="select-wrapper">
                                <select name="category" id="category">
                                    <option value="">- Fly number -</option>
                                    <option value="LY385">LY385</option>
                                    <option value="LY383">LY383</option>
                                    <option value="LY385">LY385</option>
                                    <option value="LY383">LY383</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row uniform 50%">
                        <div class="4u 12u(narrower)">
                            <input type="checkbox" id="opt01">
                            <label for="opt01">Opt 01</label>
                        </div>
                        <div class="4u 12u(narrower)">
                            <input type="checkbox" id="opt02">
                            <label for="opt02">Opt 02</label>
                        </div>
                        <div class="4u 12u(narrower)">
                            <input type="checkbox" id="opt03" checked>
                            <label for="opt03">Opt 03</label>
                        </div>
                    </div>
                    <div class="row uniform 50%">
                        <div class="12u">
                            <textarea name="message" id="message" placeholder="Note" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="row uniform">
                        <div class="12u">
                            <ul class="actions">
                                <li><input type="submit" value="Start booking" /></li>
                                <li><input type="reset" value="Reset" class="alt" /></li>
                            </ul>
                        </div>
                    </div>
                </form>

            </section>
        </div>
    </div>
</section>
