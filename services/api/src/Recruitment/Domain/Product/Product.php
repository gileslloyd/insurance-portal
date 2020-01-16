<?php
declare(strict_types=1);

namespace Product;

class Product
{
	private string $id;

	private string $name;

	private string $description;

	private string $type;

	private array $suppliers;

	public function __construct(
		string $id,
		string $name,
		string $description,
		string $type,
		array $suppliers = []
	) {
		$this->id = $id;
		$this->name = $name;
		$this->description = $description;
		$this->type = $type;
		$this->suppliers = $suppliers;
	}

	/**
	 * @return string
	 */
	public function getId(): string
	{
		return $this->id;
	}

	/**
	 * @return string
	 */
	public function getName(): string
	{
		return $this->name;
	}

	/**
	 * @return string
	 */
	public function getDescription(): string
	{
		return $this->description;
	}

	/**
	 * @return string
	 */
	public function getType(): string
	{
		return $this->type;
	}

	/**
	 * @return array
	 */
	public function getSuppliers(): array
	{
		return $this->suppliers;
	}
}
