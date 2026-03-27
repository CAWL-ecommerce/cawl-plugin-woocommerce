# CAWL for WooCommerce

## Description

CAWL for WooCommerce allows store owners to securely accept and process payments through CAWL’s payment solutions. Our plug-in comes with regular updates and full integration support, guaranteeing a versatile out-of-the-box solution to accept online payments easily. The plugin ensures secure transactions by utilizing advanced encryption and security protocols, providing both store owners and customers peace of mind when it comes to payment security.

### Features

* Supports all major global and local payment methods
* Authorization/Sale mode for transactions
* Onsite payments for increased conversion
* Advanced 3DS options
* PSD2 and PCI-DSS Compliant
* Possibility of custom branding on the payment pages
* Maintenance transactions within WooCommerce cockpit

### Effortless Integration

Our plugin is crafted to integrate seamlessly into your WooCommerce store without hassle. With easy installation and setup, you’ll be ready to accept a wide array of payment methods including credit cards, debit cards, and alternative payments in no time.

## Frequently Asked Questions

**Where can I find documentation for the plugin setup?**

- For help setting up and configuring the plugin, please refer to the [documentation](https://docs.ecommerce.cawl-solutions.fr/en/integration/how-to-integrate/plugins/woocommerce).

**Where can I get help for CAWL for WooCommerce?**

- For questions regarding the plugin setup, we recommend reviewing our [documentation](https://docs.ecommerce.cawl-solutions.fr/en/integration/how-to-integrate/plugins/woocommerce) if you encounter any issues.

## Installation

### Requirements

To install and configure CAWL for WooCommerce, you will need:

* WordPress Version 6.3 or newer (installed)
* WooCommerce Version 8.6 or newer (installed and activated)
* PHP Version 7.4 or newer
* CAWL account

### Installation instructions

1. Log in to WordPress admin.
2. Go to **Plugins > Add New**.
3. Search for the **CAWL for WooCommerce** plugin.
4. Click on **Install Now** and wait until the plugin is installed successfully.
5. You can activate the plugin immediately by clicking on **Activate** now on the success page. If you want to activate it later, you can do so via **Plugins > Installed Plugins**.

### Setup and Configuration

Follow the steps below to connect the plugin to your CAWL account:

1. After you have activated the CAWL for WooCommerce plugin, go to **WooCommerce  > Settings**.
2. Click the **Payments** tab.
3. Click on **CAWL for WooCommerce**.
4. Enter the details for PSPID, API Key and Secret (live/test depending on the environment) from your CAWL Merchant Portal (**Developer > Payment API**).
5. Click on "Save" to store these settings in the plugin.
6. Copy the "Webhook endpoint".
7. Add the webhook endpoint in the CAWL back office page **Developer > Webhooks** by clicking add **webhook endpoint**.
8. Generate the webhook keys on the back office page and copy the details into the plugin settings page into the fields "Webhook ID" and "Secret Webhook key".
9. Click on **Save** to store these settings in the plugin.

Complete onboarding instructions can be found in the [documentation here](https://docs.ecommerce.cawl-solutions.fr/en/integration/how-to-integrate/plugins/woocommerce).

### Updating

Automatic updates should work generally smoothly, but we still recommend you back up your site.

If you encounter issues with the CAWL buttons not appearing after an update, purge your website cache.

## Changelog

**2.5.13 - 2026-03-09**
* Added: Support of payment method “Blik”
* Added: Support of payment method “Przelewy24”
* Added: Support of payment method “Linxo Connect”

**2.5.12 - 2026-03-03**
* Improved: Offer the possibility to only accept instant bank transfer on CAWL Gateway.

**2.5.11 - 2026-03-02**
* Fixed: Allow merchant to activate High performance order storage

**2.5.10 - 2026-02-27**
* Added: Deleting a consumer’s stored token from their account now also deletes the token on the payment platform

**2.5.9 - 2026-02-24**
* Updated: Branding of Pledg changed to Sofinco
* Updated: Branding of iDeal changed to iDEAL | Wero

**2.5.8 - 2026-02-24**
* Improved: Offer the possibility to only accept instant bank transfer.

**2.5.7 - 2026-02-10**
* Added: New payment method - SEPA Direct Debit

**2.5.6 - 2026-02-04**
* Fix: Stability for 3DS exemption capabilities

**2.5.5 - 2026-01-28**
* Fixed issue with displaying order on legacy Order data storage
* Improved exemptions capabilities related to 3DS exemption types

**2.5.4 - 2026-01-13**
* Improved: Add subbrand for Apple Pay and Google Pay payment details
* Fix: Translation of card brands in the back-end

**2.5.3 - 2026-01-09**
* Added: Additional information about transactions in orders overview and order details.
* Improved: Apple Pay is now supported with all browsers and devices

**2.5.2 - 2026-01-05**
* Added: Possibility to auto-include primary webhooks URL in the payload of payment request, and to configure up to 4 additional endpoints.
* Added: Possibility to configure which logos will be displayed next to the “Credit cards” checkout option.
* Added: Orders that contain virtual and downloadable products will immediately go in a Completed status once the payment has been completed.
* Remove the Checkout Type field

**2.5.1 - 2025-12-09**
* Add new payment method: Pledg
* Manage exemption for FR markets

**2.4.6 - 2025-11-17**
* Fix language used for hosted checkout

**2.4.5 - 2025-10-29**
* Change surcharge settings title
* Add pending order cancellation cron job logic
* Add upload logo for hosted payment to plugin settings page
* Change author URI and contributor

**2.4.4 - 2025-10-13**
* Add missing 3DS parameters for Credit Card payments
* Fix storing the wrong API key in the database

**2.4.3 - 2025-09-23**
* Fix Apple pay issue

**2.4.2 - 2025-09-19**
* Fix plugin configuration page
* Fix translation issue
* Change plugin title to Offre e-commerce de CAWL

**2.4.1 - 2025-09-17**
* Fix fatal error issue

**2.4.0 - 2025-08-11**
* Add PayPal payment method

**2.3.0 - 2025-07-29**
* Add Mealvouchers payment method
* Add CVCO payment method
* Add EPS payment method

**2.2.0 - 2025-04-29**
* Allow SCA exemptions with Transaction Risk Analysis.
* Show totals with Surcharge on the checkout page.
* Add payment method logos on checkout.
* Improve settings tooltips.

**2.1.0 - 2025-03-31**
* Added single payment methods (Klarna, PostFinance, Twint).
* Allow to capture payments automatically after the specified time.
* Improve UI in WooCommerce 9.6+.
* Show saved cards on the Pay for Order page.
* Handle saved cards in Hosted Tokenization.
* Add payment method icons in checkout.
* Fix handling of orders that had multiple payment attempts.
* Enable 3DS by default.

**2.0.0 - 2025-03-10**
* Added Hosted Tokenization (credit cards) payment method.
* Added single payment methods (Apple Pay, BankTransfer, GooglePay, iDeal).
* 3DS improvements (Frictionless Flow, Exempt Flow & Challenge Flow).
* Allow to specify templates of hosted tokenization and hosted checkout pages.
* Allow to change the payment method title.
* Allow to disable submission of the cart data.

**1.0.1 - 2024-10-02**
* Allow to set test and live webhook credentials separately.
* Improve refunding, mark refunded items.
* Fix payment method title.

**1.0.0 - 2024-08-01**
* Initial release.
