<?php


class importaxml {

        function entradaxml(){

       // $filename = 'file:///Users/hanrrison/Desktop/1.xml'; //busca o caminho do arquivo xml $filename = './';
        //$filename = 'file:///Users/hanrrison/Desktop/35171205570714000159550010046876581097771095.xml';
        
    

        if (!isset($_FILES['doc']) || ($_FILES['doc']['error'] != UPLOAD_ERR_OK)) {
            //o campo fica em branco
        } else {
            $xml = simplexml_load_file($_FILES['doc']['tmp_name']);

            foreach ($xml->NFe as $NFe) {
                foreach ($xml->NFe->infNFe as $infNFe) {
                    foreach ($xml->NFe->infNFe->ide as $ide) {
                        $numeroNF = $ide->nNF;
                        $serie = $ide->serie;
                        $dhEmi = $ide->dhEmi; //data da emissao da nota
                        foreach ($xml->NFe->infNFe->emit as $emit) {
                            $xNome = $emit->xNome;
                            foreach ($xml->NFe->infNFe->emit->enderEmit as $enderEmit) {
                                $xLgr = $enderEmit->xLgr;
                                $xBairro = $enderEmit->xBairro;
                                $xMun = $enderEmit->xMun;
                                $UF = $enderEmit->UF;
                                foreach ($xml->NFe->infNFe->total->ICMSTot as $valortotalnfe) {
                                    $vNF = $valortotalnfe->vNF; //pega o valor total da nota
                                }
                            }
                        }
                    }
                }
            }
        }
        
        $dadosarray = array($vNF, $dhEmi);
        return $dadosarray;

        }   
}