<?php
class Subscription {
    private $id;
    private $first_name;
    private $last_name;
    private $email;
    private $phone;
    private $SubscriptionName; 
    private $subscription_type;
    private $prix;
    private $payment_method;
    private $created_at;
    private $expiry_date;

    public function __construct(
        ?int $id,
        string $first_name,
        string $last_name,
        string $email,
        string $phone,
        string $SubscriptionName,
        string $subscription_type,
        string $prix,
        string $payment_method,
        string $created_at,
        string $expiry_date
    ) {
        $this->id = $id;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->phone = $phone;
        $this->SubscriptionName = $SubscriptionName;
        $this->subscription_type = $subscription_type;
        $this->prix =$prix;
        $this->payment_method = $payment_method;
        $this->created_at = $created_at ?? date('Y-m-d H:i:s');
        $this->expiry_date = $expiry_date;
    }

    // Getters
    public function getId(): ?int {
        return $this->id;
    }

    public function getFirstName(): string {
        return $this->first_name;
    }

    public function getLastName(): string {
        return $this->last_name;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getPhone(): string {
        return $this->phone;
    }
    public function getSubscriptionName(): string {
        return $this->SubscriptionName;
    }

    public function getSubscriptionType(): string {
        return $this->subscription_type;
    }
    public function getPrix(): string {
        return $this->prix;
    }

    public function getPaymentMethod(): string {
        return $this->payment_method;
    }
    

    public function getCreatedAt(): string {
        return $this->created_at;
    }

    public function getExpiryDate(): string {
        return $this->expiry_date;
    }

    // Setters
    public function setId(?int $id): void {
        $this->id = $id;
    }

    public function setFirstName(string $first_name): void {
        $this->first_name = $first_name;
    }

    public function setLastName(string $last_name): void {
        $this->last_name = $last_name;
    }

    public function setEmail(string $email): void {
        $this->email = $email;
    }

    public function setPhone(string $phone): void {
        $this->phone = $phone;
    }
    public function setSubscriptionName(string $SubscriptionName): void {
        $this->SubscriptionName = $SubscriptionName;
    }

    public function setSubscriptionType(string $subscription_type): void {
        $this->subscription_type = $subscription_type;
    }
    public function setPrix(string $prix): void {
        $this->prix = $prix;
    }

    
    public function setPaymentMethod(string $payment_method): void {
        $this->payment_method = $payment_method;
    }

    public function setCreatedAt(string $created_at): void {
        $this->created_at = $created_at;
    }

    public function setExpiryDate(string $expiry_date): void {
        $this->expiry_date = $expiry_date;
    }
}
?>