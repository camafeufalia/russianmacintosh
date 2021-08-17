<?php


            	$public_key = '608ec83a708dafb39875bf9e4166ab693567559cd955cf99aec9eb7ee7fffc03'; 
        		$private_key = '3Cc95e2f92A12aAD237372C13a6ff3Cc7aE77f76c6874707Fd0388661B029A2c'; 
        
    
                        $req = array();
            
                        $req['version'] = 1; 
                        $req['cmd'] = "create_transaction";
                        
                        //$req['currency'] = "BTC";
                        $req['currency1'] = "BTC";
                        $req['currency2'] = "BTC";
                        $req['amount'] = 1;
                        $req['timeout'] = 604800;
                        //$req['timeout'] = 259200;
                        $req['buyer_email'] = "teste@gmail.com";
                        $req['item'] = 'Investimento #';
                        $req['ipn_url'] = 'https://speedinvest.investtrade.com.br/investimentos-ativos';
                        
                        $req['success_url'] = 'https://speedinvest.investtrade.com.br/investimentos-ativos';
                        $req['cancel_url'] = 'https://speedinvest.investtrade.com.br/backoffice';
                        
                        $req['key'] = $public_key; 
                        $req['format'] = 'json'; //supported values are json and xml 
                        
                        $req['key'] = $public_key; 
                        $req['format'] = 'json'; //supported values are json and xml 
                         
                        // Generate the query string 
                        $post_data = http_build_query($req, '', '&'); 
                         
                        // Calculate the HMAC signature on the POST data 
                        $hmac = hash_hmac('sha512', $post_data, $private_key); 
                         
                        // Use curl to hit the endpoint so that you can send the required headers 
                        $ch = curl_init('https://www.coinpayments.net/api.php'); 
                            curl_setopt($ch, CURLOPT_FAILONERROR, TRUE); 
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); 
                            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); 
                        curl_setopt($ch, CURLOPT_HTTPHEADER, array('HMAC: '.$hmac)); 
                        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data); 
                         
                        // Execute the call and close cURL handle      
                        $data = curl_exec($ch); 
                    
                        // dump the data returned back from coinpayments
                        var_dump($data);