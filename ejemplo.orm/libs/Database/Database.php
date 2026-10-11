<?php
namespace Framework\Tools\DB;

/**
 * @package Framework\Tools\DB
 * @author Jose Damian del Angel Ferrer (@ferrerjd)
 * 
 * Class Database
 * [DESCRIPCIÓN]
 */

foreach ([ 'interface', 'traits.read', 'traits.write', 'traits.operations' ] as $fileName) {
    is_readable( $filePath = realpath( __DIR__."/$fileName.php" ) ) && require_once($filePath);
}

use Framework\Tools\DB\Interfaces\IDatabase;
use Framework\Tools\DB\Traits\TReadOperations;
use Framework\Tools\DB\Traits\TWriteOperations;
use Framework\Tools\DB\Traits\TTransactionOperations;

/**
 * Clase Database
 * Implementa la interfaz Database y utiliza traits para operaciones IO.
 *
 * @package Framework\Tools\DB
 */
class Database implements IDatabase {
    use TReadOperations, TWriteOperations, TTransactionOperations;

    private \PDO $pdo;
    private bool $inTransaction;

    /**
     * Constructor de la clase Database.
     *
     * @param array $connectionData Datos de conexión que incluyen driver, host, port, dbname, charset, username, password.
     * @param array $attributes Opcionales. Atributos adicionales para la conexión PDO.
     * @throws \Exception Si hay un problema con la conexión.
     */
    public function __construct(array $connectionData, array $attributes = []) {
        try {
            // Validar datos de conexión requeridos
            $requiredKeys = ['driver', 'dbname'];
            foreach ($requiredKeys as $key) {
                if (empty($connectionData[$key])) {
                    throw new \InvalidArgumentException("Falta el parámetro requerido: {$key}");
                }
            }
    
            // Construiremos el DSN dinámicamente según el driver
            $dsn = NULL;

            // Construcción del DSN
            $dsn = match ($connectionData['driver']) {
                'mysql', 'pgsql' => sprintf(
                    '%s:host=%s;port=%s;dbname=%s;charset=%s',
                    $connectionData['driver'],
                    $connectionData['host'] ?? '127.0.0.1',
                    $connectionData['port'] ?? '3306',
                    $connectionData['dbname'],
                    $connectionData['charset'] ?? 'utf8mb4'
                ),
                'sqlite' => sprintf('sqlite:%s', $connectionData['dbname']),
                default => throw new \Exception("Motor de base de datos no soportado: {$connectionData['driver']}"),
            };

            // Establecer credenciales (solo si se necesitan)
            $username = $connectionData['username'] ?? null;
            $password = $connectionData['password'] ?? null;
    
            // Configurar atributos de PDO
            $connectionAttributes = array_merge([
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            ], $attributes);

            // Crear el objeto PDO
            $this->pdo = new \PDO($dsn, $username, $password, $connectionAttributes);
        } catch (\PDOException $e) {
            throw new \RuntimeException('Error al conectar con la base de datos: ' . $e->getMessage(), 0, $e);
        }
    }

    /**
     * Obtiene la instancia de PDO.
     *
     * @return \PDO
     */
    public function getPdo(): \PDO {
        return $this->pdo;
    }
}