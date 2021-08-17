<?php


            	        $public_key = '988c26d6a7b08e16d7d673f384b0275e80f3d8190e1c3656e66e3c4d4fe6eb86'; 
        $private_key = 'B956172202fAAf20dB441Ab0EC9DDB7C4508b65B03d0Aefd3210950F83f6f634'; 
        
    
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