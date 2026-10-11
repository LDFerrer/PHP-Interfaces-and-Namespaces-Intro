<?php
namespace Framework\Tools\DB\Traits;

/**
 * @package Framework\Tools\DB\Traits
 * @author Jose Damian del Angel Ferrer (@ferrerjd)
 * 
 * Trait TTransactionOperations
 * [DESCRIPCIÓN]
 */
trait TTransactionOperations {
    /**
     * Inicia una transacción en la base de datos.
     *
     * @return bool
     * @throws \PDOException Si falla el inicio de la transacción.
     */
    public function transactionBegin(): bool {
        if (!$this->inTransaction) {
            try {
                $this->inTransaction = $this->pdo->beginTransaction();
            } catch (\PDOException $e) {
                throw new \PDOException("Error al iniciar la transacción: " . $e->getMessage());
            }
        }

        return true; // Transacción iniciada
    }

    /**
     * Confirma los cambios realizados durante una transacción.
     *
     * @return bool
     * @throws \PDOException Si falla la confirmación de la transacción.
     */
    public function transactionCommit(): bool {
        if ($this->inTransaction) {
            try {
                $result = $this->pdo->commit();
                $this->inTransaction = false;
                return $result;
            } catch (\PDOException $e) {
                throw new \PDOException("Error al confirmar la transacción: " . $e->getMessage());
            }
        }

        return false; // No hay transacción activa
    }

    /**
     * Revierte los cambios realizados durante una transacción.
     *
     * @return bool
     * @throws \PDOException Si falla la reversión de la transacción.
     */
    public function transactionRollback(): bool {
        if ($this->inTransaction) {
            try {
                $result = $this->pdo->rollBack();
                $this->inTransaction = false;
                return $result;
            } catch (\PDOException $e) {
                throw new \PDOException("Error al revertir la transacción: " . $e->getMessage());
            }
        }

        return false; // No hay transacción activa
    }

    /**
     * Verifica si hay una transacción en curso.
     *
     * @return bool
     */
    public function isTransactionActive(): bool {
        return $this->inTransaction;
    }
}
