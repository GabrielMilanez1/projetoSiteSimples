<?php

Class LoginService
{
  public static function getUsers()
  {
    $users = 
      [
        'admin' => [
          'password' => 'admin',
          'nome' => 'Administrador',
          'data_nascimento' => '1924/04/20 00:00:00',
          'cargo' => 'Programador',
          'email' => 'teste1@uni9.edu.br',
          'telefone' => '11999998888'
        ],
        'admin2' => [
          'password' => 'admin2',
          'nome' => 'Administrador 2',
          'data_nascimento' => '1969/12/10 00:00:00',
          'cargo' => 'Estagiário',
          'email' => 'teste2@uni9.edu.br',
          'telefone' => '31977776666'
        ],
        'admin3' => [
          'password' => 'admin3',
          'nome' => 'Administrador 3',
          'data_nascimento' => '1954/05/31 00:00:00',
          'cargo' => 'Porteiro',
          'email' => 'teste3@uni9.edu.br',
          'telefone' => '81933334444'
        ]
      ];

    return $users;
  }

  public static function login($username, $password)
  {
    $users = self::getUsers();

    if (isset($users[$username]) && $users[$username]['password'] === $password) {
      return true;
    }

    return false;
  }

  public static function getIntegrantesGrupoByUsername($username)
  {
    $integrantes_do_grupo_by_username = 
    [
        'admin' => [
          ['nome' => 'Nome Do Integrante', 'RA' => 1010101010],
          ['nome' => 'Nome Do Integrante', 'RA' => 1010101010],
          ['nome' => 'Nome Do Integrante', 'RA' => 1010101010],
          ['nome' => 'Nome Do Integrante', 'RA' => 1010101010],
          ['nome' => 'Nome Do Integrante', 'RA' => 1010101010],
          ['nome' => 'Nome Do Integrante', 'RA' => 1010101010],
        ],
        'admin2' => [
          ['nome' => 'Nome Do Integrante', 'RA' => 1010101010],
          ['nome' => 'Nome Do Integrante', 'RA' => 1010101010],
          ['nome' => 'Nome Do Integrante', 'RA' => 1010101010],
          ['nome' => 'Nome Do Integrante', 'RA' => 1010101010],
          ['nome' => 'Nome Do Integrante', 'RA' => 1010101010],
          ['nome' => 'Nome Do Integrante', 'RA' => 1010101010],
        ], 
        'admin3' => [
          ['nome' => 'Nome Do Integrante', 'RA' => 1010101010],
          ['nome' => 'Nome Do Integrante', 'RA' => 1010101010],
          ['nome' => 'Nome Do Integrante', 'RA' => 1010101010],
          ['nome' => 'Nome Do Integrante', 'RA' => 1010101010],
          ['nome' => 'Nome Do Integrante', 'RA' => 1010101010],
          ['nome' => 'Nome Do Integrante', 'RA' => 1010101010],
        ]
    ];

    return $integrantes_do_grupo_by_username[$username];
  }

}