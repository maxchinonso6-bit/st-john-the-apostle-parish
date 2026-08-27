<!DOCTYPE html>
<html>
<body style="font-family: sans-serif; line-height: 1.6;">
    @if($type === 'mass_booking')
        <h2>New Mass Booking Submitted</h2>
        <p><strong>Name:</strong> {{ $record->booker_name }}</p>
        <p><strong>Phone:</strong> {{ $record->phone }}</p>
        <p><strong>Email:</strong> {{ $record->email }}</p>
        <p><strong>Intention Type:</strong> {{ $record->intention_type }}</p>
        <p><strong>Intention:</strong> {{ $record->intention_text }}</p>
        <p><strong>Mass Date:</strong> {{ $record->mass_date }}</p>
        <p><strong>Amount:</strong> ₦{{ number_format($record->amount, 2) }}</p>
    @else
        <h2>New Donation Submitted</h2>
        <p><strong>Project:</strong> {{ $record->project->title }}</p>
        <p><strong>Donor:</strong> {{ $record->donor_name ?? 'Anonymous' }}</p>
        <p><strong>Email:</strong> {{ $record->email }}</p>
        <p><strong>Amount:</strong> ₦{{ number_format($record->amount, 2) }}</p>
    @endif
    <p>Proof of payment is attached. Please verify the transfer and mark this record as <strong>Paid</strong> in the admin dashboard.</p>
    <p><a href="{{ url('/admin') }}">Go to Admin Dashboard</a></p>
</body>
</html>