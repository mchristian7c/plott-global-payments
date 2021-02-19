
    <?php include('headScripts.php'); ?>
    <div class="banner_top">
        <div class="wrapper">
            <div class="banner_title">invoice payments</div>
        </div>
    </div>
        <form method="post">
            <header>
                <p>Payments made via this portal relate to invoices for services that have been arranged by Freightport Logistics.</p>
                <p>All complaints or issues in respect of fee requests raised should be sent by email to <a href="mailto:accounts@freightport.co.uk">accounts@freightport.co.uk</a> in the first instance. No refunds are available.</p>
            </header>

            <div class="form-inner">

            <?php if (isset($errors) && $errors->any()): ?>
                <div class="alert alert-danger" role="alert">
                    <?php foreach ($errors->all() as $error): ?>
                        <p><?php echo $error; ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <fieldset class="customer-details">
                <h3>Your Details</h3>

                <label>
                    Your Name <span class="required">*</span>:<br>
                    <input type="text" name="customer_name" placeholder="Joe Bloggs" required />
                </label>

                <label>
                    Your Email <span class="required">*</span>:<br>
                    <input type="email" name="customer_email" placeholder="joe.bloggs@domain.com" required />
                </label>

                <label>
                    Your Phone Number <span class="required">*</span>:<br>
                    <input type="text" name="customer_phone" placeholder="0123 465 7890" required />
                </label>

                <label>
                    Company <span class="required">*</span>:<br>
                    <input type="text" name="business_name" placeholder="ACME Corp" required />
                </label>

                <label>
                    <?php
                        /**
                         * Mark/Ash, might be worth changing this to a number type
                         * I'm unsure what the invoice numbers look like. Rest
                         * assured its safe to do so should you wish
                         */
                    ?>
                    Invoice Number <span class="required">*</span>:<br>
                    <input type="text" name="invoice_number" placeholder="123456" required />
                </label>

                <label>
                    Invoice Amount <span class="required">*</span>:<br>
                    <input type="number" min="0.01" step="0.01" value="0" name="invoice_amount" placeholder="99.99" required />
                </label>
            </fieldset>

            <fieldset class="company-address">
                <h3>Company Address:</h3>

                <label>
                    Address line 1 <span class="required">*</span>:<br>
                    <input type="text" name="shippingAddress[address_line_1]" required />
                </label>

                <label>
                    Address line 2:<br>
                    <input type="text" name="shippingAddress[address_line_2]" />
                </label>

                <label>
                    Address line 3:<br>
                    <input type="text" name="shippingAddress[address_line_3]" />
                </label>

                <label>
                    Town/City <span class="required">*</span>:<br>
                    <input type="text" name="shippingAddress[town]" required />
                </label>

                <label>
                    Postcode <span class="required">*</span>:<br>
                    <input type="text" name="shippingAddress[postcode]" maxlength="8" required />
                </label>
            </fieldset>

            <div class="billing-details--wrapper">
                <div class="billing-details--title">
                    <h3>Billing Address</h3>
                    <label>
                        Use the <strong>company address</strong> for billing address
                        <input type="checkbox" name="billing_copy" value="1" checked />
                    </label>
                </div>
                <fieldset class="billing-details hidden">
                    <label>
                        Billing Address line 1 <span class="required">*</span>:<br>
                        <input class="optionallyRequired" type="text" name="billingAddress[address_line_1]" />
                    </label>

                    <label>
                        Billing Address line 2:<br>
                        <input type="text" name="billingAddress[address_line_2]" />
                    </label>

                    <label>
                        Billing Address line 3:<br>
                        <input type="text" name="billingAddress[address_line_3]" />
                    </label>

                    <label>
                        Billing Town/City <span class="required">*</span>:<br>
                        <input class="optionallyRequired" type="text" name="billingAddress[town]" />
                    </label>

                    <label>
                        Billing Postcode <span class="required">*</span>:<br>
                        <input class="optionallyRequired" type="text" name="billingAddress[postcode]" maxlength="8" />
                    </label>
                </fieldset>
            </div>



            <footer>
                <input type="hidden" name="submitted" value="1" />
                <button>Continue</button>
            </footer>
            </div>
        </form>
    <?php include('footScripts.php'); ?>
