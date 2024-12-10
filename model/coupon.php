<?php
class Coupon {
    private $id;
    private $code;
    private $subscription_id;
    private $discount_percentage;
    private $expiry_date;
    private $created_at;

    public function __construct(
        ?int $id,
        int $subscription_id,
        float $discount_percentage,
        string $expiry_date,
        string $created_at
    ) {
        $this->id = $id;
        $this->code = $this->generateCode(); // Automatically generate the 4-character code
        $this->subscription_id = $subscription_id;
        $this->discount_percentage = $discount_percentage;
        $this->expiry_date = $expiry_date;
        $this->created_at = $created_at ?? date('Y-m-d H:i:s');
    }

    // Method to generate a random 4-character coupon code
    private function generateCode(): string {
        return strtoupper(substr(bin2hex(random_bytes(2)), 0, 4)); // Generates 4 random hex characters
    }

    // Getters
    public function getId(): ?int {
        return $this->id;
    }

    public function getCode(): string {
        return $this->code;
    }

    public function getSubscriptionId(): int {
        return $this->subscription_id;
    }

    public function getDiscountPercentage(): string {
        return $this->discount_percentage;
    }

    public function getExpiryDate(): string {
        return $this->expiry_date;
    }

    public function getCreatedAt(): string {
        return $this->created_at;
    }

    // Setters
    public function setId(?int $id): void {
        $this->id = $id;
    }

    public function setCode(string $code): void {
        $this->code = $code;
    }

    public function setSubscriptionId(int $subscription_id): void {
        $this->subscription_id = $subscription_id;
    }

    public function setDiscountPercentage(string $discount_percentage): void {
        $this->discount_percentage = $discount_percentage;
    }

    public function setExpiryDate(string $expiry_date): void {
        $this->expiry_date = $expiry_date;
    }

    public function setCreatedAt(string $created_at): void {
        $this->created_at = $created_at;
    }
}
?>
