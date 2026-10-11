<?php
namespace Framework\Tools\DB\Interfaces;

/**
 * @package Framework\Tools\DB\Interfaces
 * @author Jose Damian del Angel Ferrer (@ferrerjd)
 * 
 * Interface IDatabase
 * Define el contrato para operaciones IO y manejo de transacciones en una base de datos.
 */
interface IDatabase {
    /**
     * Realiza una consulta SELECT en la base de datos.
     *
     * @return mixed Resultado de la consulta.
     */
    public function select();

    /**
     * Inserta un nuevo registro en la base de datos.
     *
     * @return mixed Indica si la operación fue exitosa.
     */
    public function insert();

    /**
     * Actualiza un registro existente en la base de datos.
     *
     * @return bool Indica si la operación fue exitosa.
     */
    public function update();

    /**
     * Elimina un registro de la base de datos.
     *
     * @return bool Indica si la operación fue exitosa.
     */
    public function delete();

    /**
     * Inicia una transacción en la base de datos.
     *
     * @return bool
     */
    public function transactionBegin(): bool;

    /**
     * Confirma los cambios realizados durante una transacción.
     *
     * @return bool
     */
    public function transactionCommit(): bool;

    /**
     * Revierte los cambios realizados durante una transacción.
     *
     * @return bool
     */
    public function transactionRollback(): bool;

    /**
     * Verifica si hay una transacción en curso.
     *
     * @return bool
     */
    public function isTransactionActive(): bool;
}