<?php

loadModel('User');

class Login extends Model {


    //esse metodo verifica se o usuario foi deligado e se a senha esta correta 
    
    public function checkLogin()
    {
        $user = User::getOne(['email' => $this->email]);
        
        if($user) {
            if($user->end_date) { //si exitir data de saida 
                throw new AppException('Usuario esta desligado da empresa.');
            }
            
            //vericação da sehnha 
            if(password_verify($this->password, $user->password)) {
                return $user;
            }
        }
        // si caso cair em alguma dessas condiçoes 
        throw new AppException('Usuario ou Senha invalidos');
    }

}