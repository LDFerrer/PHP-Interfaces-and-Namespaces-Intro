<?php

namespace DataInterfaces\Model;

interface CRUD_Operations {
	public function ErrorEvent();
	// public function Connect(): bool;
	// public function Insert(
	// 	string $target,
	// 	array $placeHolders
	// ): int;
	// public function Select(
	// 	string $target,
	// 	mixed $fields = '*',
	// 	array $whereCondition = NULL
	// ): array;
	// public function SelectRow(
	// 	string $target,
	// 	mixed $fields = '*',
	// 	array $whereCondition = NULL
	// ): array;
	// public function SelectValue(
	// 	string $target,
	// 	string $field,
	// 	array $whereCondition = NULL
	// ): mixed;
	// public function Update(
	// 	string $target,
	// 	array $setValues,
	// 	array $whereCondition = NULL
	// ): bool;
	// public function Delete(
	// 	string $target,
	// 	array $whereCondition
	// ): bool;
}

interface DBSource extends CRUD_Operations {
	// public function Execute(
	// 	string $SQLStatement,
	// 	array $placeHolders
	// ): array;
	// public function Query(
	// 	string $target,
	// 	mixed $fields = '*',
	// 	array $whereCondition = NULL
	// ): array;
	// public function QueryRow(
	// 	string $target,
	// 	mixed $fields = '*',
	// 	array $whereCondition = NULL
	// ): array;
	// public function QueryValue(
	// 	string $target,
	// 	string $field,
	// 	array $whereCondition = NULL
	// ): mixed;
	// public function TransactionBegin(): bool;
	// public function TransactionCommit(): bool;
	// public function TransactionRollback(): bool;
}

interface APISource extends CRUD_Operations {
	// public function checkAsWriteOp(): bool;
}