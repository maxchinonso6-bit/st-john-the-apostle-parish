<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Station;
use App\Models\Zone;
use App\Models\ZoneExecutive;
use App\Models\Organisation;
use App\Models\Activity;
use App\Models\Building;
use App\Models\SchoolActivity;
use App\Models\Reflection;
use App\Models\MassSchedule;
use App\Models\Clergy;
use App\Models\ParishCouncilExecutive;
use App\Models\DonationProject;
use App\Models\Setting;

class DemoDataSeeder extends Seeder
{
    public function run(): void
    {
        // ---------- STATIONS & ZONES ----------
        $emmanuel = Station::create([
            'name' => "Emmanuel's Station",
            'description' => 'One of the two stations of St John the Apostle Parish, Isiakpu Nsukka.',
        ]);

        $stJohn = Station::create([
            'name' => "St. John's Station",
            'description' => 'One of the two stations of St John the Apostle Parish, Isiakpu Nsukka.',
        ]);

        $stPaul = Zone::create([
            'station_id' => $emmanuel->id,
            'name' => "St Paul's Zone",
            'description' => 'One of the zones under Emmanuel\'s Station.',
            'meeting_day' => 'Every 2nd Sunday',
            'meeting_time' => '4:00 PM',
            'meeting_venue' => 'St Paul\'s Zonal Hall',
        ]);

        $stJude = Zone::create([
            'station_id' => $emmanuel->id,
            'name' => "St Jude's Zone",
            'description' => 'One of the zones under Emmanuel\'s Station.',
            'meeting_day' => 'Every 2nd Sunday',
            'meeting_time' => '4:00 PM',
            'meeting_venue' => 'St Jude\'s Zonal Hall',
        ]);

        $stFrancis = Zone::create([
            'station_id' => $stJohn->id,
            'name' => "St Francis' Zone",
            'description' => 'One of the zones under St. John\'s Station.',
            'meeting_day' => 'Every last Sunday',
            'meeting_time' => '4:00 PM',
            'meeting_venue' => 'St Francis\' Zonal Hall',
        ]);

        $stJane = Zone::create([
            'station_id' => $stJohn->id,
            'name' => "St Jane's Zone",
            'description' => 'One of the zones under St. John\'s Station.',
            'meeting_day' => 'Every last Sunday',
            'meeting_time' => '4:00 PM',
            'meeting_venue' => 'St Jane\'s Zonal Hall',
        ]);

        // ---------- ZONE EXECUTIVES ----------
        ZoneExecutive::create(['zone_id' => $stPaul->id, 'name' => 'Peter Eze', 'position' => 'Chairman', 'phone' => '08030000001', 'status' => 'active', 'start_year' => 2023]);
        ZoneExecutive::create(['zone_id' => $stPaul->id, 'name' => 'Grace Ugwu', 'position' => 'Secretary', 'phone' => '08030000002', 'status' => 'active', 'start_year' => 2023]);
        ZoneExecutive::create(['zone_id' => $stJude->id, 'name' => 'Michael Onah', 'position' => 'Chairman', 'phone' => '08030000003', 'status' => 'active', 'start_year' => 2023]);
        ZoneExecutive::create(['zone_id' => $stFrancis->id, 'name' => 'Theresa Nweke', 'position' => 'Chairperson', 'phone' => '08030000004', 'status' => 'active', 'start_year' => 2023]);
        ZoneExecutive::create(['zone_id' => $stJane->id, 'name' => 'Anthony Okafor', 'position' => 'Chairman', 'phone' => '08030000005', 'status' => 'active', 'start_year' => 2023]);

        // ---------- ORGANISATIONS ----------
        $cyon = Organisation::create(['name' => 'CYON', 'type' => 'activity', 'mission' => 'Catholic Youth Organisation of Nigeria — forming young people in faith, fellowship, and service.', 'meeting_day' => 'Sunday', 'meeting_time' => '2:00 PM', 'meeting_venue' => 'Parish Hall']);
        $cwo = Organisation::create(['name' => 'CWO', 'type' => 'activity', 'mission' => 'Catholic Women Organisation — women united in prayer, charity, and formation.', 'meeting_day' => 'Sunday', 'meeting_time' => '1:00 PM', 'meeting_venue' => 'Parish Hall']);
        $hca = Organisation::create(['name' => 'HCA', 'type' => 'activity', 'mission' => 'Home and Community Association — outreach and support for families in the parish.', 'meeting_day' => 'Saturday', 'meeting_time' => '10:00 AM', 'meeting_venue' => 'Parish Hall']);
        $holyChildhood = Organisation::create(['name' => 'Holy Childhood Association', 'type' => 'activity', 'mission' => 'Forming children in the faith through prayer, songs, and mission awareness.', 'meeting_day' => 'Sunday', 'meeting_time' => '12:00 PM', 'meeting_venue' => 'Children\'s Chapel']);
        $cmo = Organisation::create(['name' => 'CMO', 'type' => 'activity', 'mission' => 'Catholic Men Organisation — men supporting parish upkeep, security, and formation.', 'meeting_day' => 'Sunday', 'meeting_time' => '1:00 PM', 'meeting_venue' => 'Parish Hall']);

        $legionOfMary = Organisation::create(['name' => 'Legion of Mary', 'type' => 'pious', 'mission' => 'A lay apostolic association dedicated to prayer and works of charity under the patronage of Mary.', 'meeting_day' => 'Wednesday', 'meeting_time' => '5:00 PM', 'meeting_venue' => 'Parish Hall']);
        $sacredHeart = Organisation::create(['name' => 'Sacred Heart', 'type' => 'pious', 'mission' => 'Devotion to the Sacred Heart of Jesus through prayer and adoration.', 'meeting_day' => 'Friday', 'meeting_time' => '5:00 PM', 'meeting_venue' => 'Adoration Chapel']);
        $olph = Organisation::create(['name' => 'Our Lady of Perpetual Help', 'type' => 'pious', 'mission' => 'Marian devotion society dedicated to the Perpetual Novena and works of mercy.', 'meeting_day' => 'Tuesday', 'meeting_time' => '5:00 PM', 'meeting_venue' => 'Parish Hall']);

        // ---------- ACTIVITIES ----------
        Activity::create(['organisation_id' => $cyon->id, 'title' => 'Youth Retreat', 'description' => 'Annual overnight retreat for young people of the parish, featuring talks, adoration, and fellowship.', 'date' => now()->addDays(10)]);
        Activity::create(['organisation_id' => $cwo->id, 'title' => 'Rosary Novena', 'description' => 'Nine days of rosary devotion for the intentions of the parish and its families.', 'date' => now()->addDays(5)]);
        Activity::create(['organisation_id' => $cmo->id, 'title' => 'Grounds Cleanup Day', 'description' => 'Men of the parish gather to clean and maintain the church premises.', 'date' => now()->addDays(3)]);
        Activity::create(['organisation_id' => $hca->id, 'title' => 'Community Home Visitation', 'description' => 'Visiting the elderly and homebound members of the parish community.', 'date' => now()->addDays(15)]);
        Activity::create(['organisation_id' => $holyChildhood->id, 'title' => 'Children\'s Mission Sunday', 'description' => 'Special program raising mission awareness among the children of the parish.', 'date' => now()->addDays(20)]);
        Activity::create(['organisation_id' => $legionOfMary->id, 'title' => 'Legion Annual Acies', 'description' => 'Annual renewal of consecration to Our Lady by all Legion of Mary members.', 'date' => now()->addDays(25)]);

        // ---------- BUILDINGS ----------
        Building::create(['name' => 'Main Church', 'description' => 'The principal worship space of the parish, seating over 800 people, and the site of Sunday and weekday Masses.']);
        Building::create(['name' => 'Adoration Chapel', 'description' => 'A quiet chapel open daily for Eucharistic Adoration and private prayer.']);
        Building::create(['name' => 'Parish Office', 'description' => 'Home to parish administration, sacramental records, and staff.']);
        Building::create(['name' => 'Parish Hall', 'description' => 'Multi-purpose hall used for parish events, meetings, and receptions.']);
        Building::create(['name' => 'School Building', 'description' => 'Home of St John the Apostle Catholic School.']);

        // ---------- SCHOOL ACTIVITIES ----------
        SchoolActivity::create(['title' => 'Foundation Day & Sports Fest', 'description' => 'Annual inter-house sports competition celebrating the founding of the school.', 'date' => now()->addMonths(2)]);
        SchoolActivity::create(['title' => 'Patronal Feast Celebration', 'description' => 'School-wide Mass and cultural program in honour of St John the Apostle.', 'date' => now()->addMonths(1)]);
        SchoolActivity::create(['title' => 'Academic Quiz Bee', 'description' => 'Inter-class academic competition testing knowledge across core subjects.', 'date' => now()->addWeeks(3)]);

        // ---------- REFLECTION ----------
        Reflection::create([
            'title' => '"Ask, and It Will Be Given to You"',
            'excerpt' => 'This Sunday\'s Gospel invites us into the persistence of prayer — not because God needs convincing, but because we need the asking. Fr. reflects on Abraham\'s bargaining with God and what it teaches us about approaching the Father with honesty, boldness, and trust.',
            'facebook_url' => 'https://facebook.com/stjohnapostleisiakpu',
            'published_at' => now(),
        ]);

        // ---------- MASS SCHEDULE ----------
        MassSchedule::create(['day_type' => 'Sunday', 'time' => '7:00 AM', 'description' => 'First Mass']);
        MassSchedule::create(['day_type' => 'Sunday', 'time' => '9:00 AM', 'description' => 'Second Mass (Igbo)']);
        MassSchedule::create(['day_type' => 'Sunday', 'time' => '11:00 AM', 'description' => 'Third Mass']);
        MassSchedule::create(['day_type' => 'Weekday', 'time' => '6:00 AM', 'description' => 'Monday to Saturday']);
        MassSchedule::create(['day_type' => 'Weekday', 'time' => '6:00 PM', 'description' => 'Monday, Wednesday, Friday']);
        MassSchedule::create(['day_type' => 'Holy Day', 'time' => '6:00 AM & 6:00 PM', 'description' => 'Holy Days of Obligation']);

        // ---------- CLERGY ----------
        Clergy::create(['name' => 'Rev. Fr. John Eze', 'role' => 'Parish Priest', 'status' => 'active', 'start_year' => 2021, 'bio' => 'Currently serving as Parish Priest of St John the Apostle Parish, Isiakpu Nsukka.']);
        Clergy::create(['name' => 'Rev. Fr. Peter Okoye', 'role' => 'Assistant Priest', 'status' => 'active', 'start_year' => 2023, 'bio' => 'Assistant Priest supporting parish ministry and sacramental life.']);
        Clergy::create(['name' => 'Rev. Fr. Vincent Nnamdi', 'role' => 'Parish Priest', 'status' => 'past', 'start_year' => 2015, 'end_year' => 2021, 'bio' => 'Served as Parish Priest from 2015 to 2021.']);
        Clergy::create(['name' => 'Rev. Sr. Mary Agnes', 'role' => 'Religious', 'status' => 'past', 'start_year' => 2010, 'end_year' => 2018, 'bio' => 'A religious sister of the parish who served in catechetical formation.']);

        // ---------- PARISH COUNCIL EXECUTIVES ----------
        ParishCouncilExecutive::create(['name' => 'Emmanuel Okonkwo', 'position' => 'Chairman', 'status' => 'active', 'order' => 0, 'bio' => 'Chairman of the Parish Pastoral Council.']);
        ParishCouncilExecutive::create(['name' => 'Christiana Eze', 'position' => 'Vice Chairperson', 'status' => 'active', 'order' => 1, 'bio' => 'Vice Chairperson of the Parish Pastoral Council.']);
        ParishCouncilExecutive::create(['name' => 'Joseph Nwafor', 'position' => 'Secretary', 'status' => 'active', 'order' => 2, 'bio' => 'Secretary of the Parish Pastoral Council.']);
        ParishCouncilExecutive::create(['name' => 'Blessing Ogbu', 'position' => 'Financial Secretary', 'status' => 'active', 'order' => 3, 'bio' => 'Financial Secretary of the Parish Pastoral Council.']);

        // ---------- DONATION PROJECTS ----------
        DonationProject::create(['title' => 'Church Building Fund', 'description' => 'Supporting the completion and maintenance of our main church building.', 'target_amount' => 5000000, 'amount_raised' => 850000]);
        DonationProject::create(['title' => 'School Building Fund', 'description' => 'Expanding classrooms and facilities for St John the Apostle Catholic School.', 'target_amount' => 3000000, 'amount_raised' => 420000]);
        DonationProject::create(['title' => 'Parish Hall Renovation', 'description' => 'Renovating the parish hall for community events and gatherings.', 'target_amount' => 1500000, 'amount_raised' => 300000]);

        // ---------- SETTINGS ----------
        Setting::create(['key' => 'bank_name', 'value' => 'First Bank of Nigeria']);
        Setting::create(['key' => 'account_name', 'value' => 'St John the Apostle Parish, Isiakpu Nsukka']);
        Setting::create(['key' => 'account_number', 'value' => '0123456789']);
        Setting::create(['key' => 'parish_office_email', 'value' => 'maxchinonso6@gmail.com']);
    }
}
