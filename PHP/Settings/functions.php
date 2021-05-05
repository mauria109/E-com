<?php
    
    
    /**
     * @param $pwd1
     * @param $pwd2
     *
     * vérifie si les 2 mots de passe saisis correspondent
     *
     * @return bool
     */
    function PasswordTest($pwd1, $pwd2): bool{
        if (($pwd1 != $pwd2)){
             $rep = false;
        }else{
            $rep = true;
        }
        return $rep;
    }
    
    /**
     * @param $password
     * @return mixed
     * vérifie si le mot de passe respecte les varchar et si oui le hache avec le sha256
     */
    
    function PasswordHash($password): string
    {
        if (!empty($password) && preg_match('/^[a-z-A-Z0-9_]+$/', $password)){
            //hachage du mdp
            return hash('sha256', '$mdp');
        }else{
             return false ;
        }
    }
    
    
    /**
     * @param $email
     *
     * teste si l'email est valide
     *
     * @return bool
     */
    function MailTest($email): bool
    {
        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)){
            $rep = false;
        }else{
            $rep = true;
        }
        return $rep;
    }
    
    
    function debug($variable){
        echo '<pre>'.print_r($variable, true).'</pre>';
    }
    
    /**
     * @param $numero
     * @param $longueur
     *
     * Fonction de pré vérification de la carte bancaire
     *
     * @return bool
     */
    function Luhn($numero, $longueur): bool
    {
        $rep = array();
        
        if (!empty($numero)) {
            if (
                (strlen($numero) === $longueur)
                && preg_match("#[0-9]{".$longueur."}#i", $numero)
            ){
                
                for ($i = 0; $i < $longueur; $i++){
                    $tabNum[$i] = substr($numero, $i, 1);
                }
                
                $luhn = 0;
                for ($i = 0; $i < $longueur; $i++){
                    if (($i % 2 === 0) && isset($tabNum)) {
                        if(($tabNum[$i] * 2) > 9){
                            $tabNum[$i] = ($tabNum[$i] * 2) -9;
                        }
                        else{
                            
                            $tabNum[$i] *= 2;
                        }
                    }
                    if (isset($tabNum)) {
                        $luhn += $tabNum[$i];
                    }
                }
                
                if($luhn % 10 === 0){
                    $rep['bool'] = true;
                }
                else{
                    $rep['bool'] = false;
                }
            }
            else{
                $rep['bool'] = false;
            }
        }
        return $rep['bool'];
    }
    
    
    /**
     * @param $fichier
     * @param $path
     *             teste un fichier avant de l'uploader
     * @param $nom
     *
     * @return bool
     */
    function UploadFiles($fichier, $path, $nom): bool
    {
        // Testons si le fichier n'est pas trop gros
        if ($fichier['size'] <= 40000000) {
            $temp = $fichier['tmp_name'];
            
            // Testons si l'extension est autorisée
            $infosfichier = pathinfo($fichier['name']);
            $extension_upload = $infosfichier['extension'];
            $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
            
            if (in_array($extension_upload, $extensions_autorisees, true)) {
                // On peut valider le fichier et le stocker définitivement
                move_uploaded_file($temp, $path.$nom);
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
    
    /**
     * @param $to
     * @param $subject
     * @param $message
     *
     *                fonction qui facilite les envois de mail avec la fonction mail
     * @return bool
     */
    function SendMail($to, $subject, $message): bool
    {
        return mail($to, $subject, $message);
    }
    
    /**
     * @param $location
     *                 fonction qui facilite les redirections avec la fonction header en y mettant déjà location:
     */
    function Redirection($location){
        return header("Location: ".$location);
    }