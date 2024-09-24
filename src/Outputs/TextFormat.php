<?php

namespace App\Outputs;

use App\Outputs\ProfileFormatter;

class TextFormat implements ProfileFormatter
{
    private $response;

    public function setData($profile)
    {
        $output = "Full Name: " . $profile->getFullName() . PHP_EOL;
        $output .= "Email: " . $profile->getContactDetails()['email'] . PHP_EOL;
        $output .= "Phone: " . $profile->getContactDetails()['phone_number'] . PHP_EOL;
        $output .= "Address: " . implode(", ", $profile->getContactDetails()['address']) . PHP_EOL;
        $output .= "Education: " . $profile->getEducation()['degree'] . " at " . $profile->getEducation()['university'] . PHP_EOL;
        $output .= "Skills: " . implode(", ", $profile->getSkills()) . PHP_EOL;
        // Add experience, certifications, etc.
        $output .= "Certifications:\n";
            foreach ($profile->getCertifications() as $certification) {
                $output .= "- " . $certification['name'] . " (Earned on: " . $certification['date_earned'] . ")\n";
            }
        $output .= "Extra-Curricular Activities:\n";
            foreach ($profile->getExtraCurricularActivities() as $activity) {
                $output .= "- " . $activity['role'] . " at " . $activity['organization'] . " (" . $activity['start_date'] . " to " . $activity['end_date'] . ")\n";
            }
        $output .= "Languages:\n";
            foreach ($profile->getLanguages() as $language) {
                $output .= "- " . $language['language'] . " (Proficiency: " . $language['proficiency'] . ")\n";
            }
        $output .= "References:\n";
            foreach ($profile->getReferences() as $reference) {
                $output .= "- " . $reference['name'] . ", " . $reference['position'] . " at " . $reference['company'] . " (Email: " . $reference['email'] . ", Phone: " . $reference['phone_number'] . ")\n";
            }
        $output .= "Experiences:\n";
        foreach ($profile->getExperience() as $job) {
            $output .= "- " . $job['job_title'] . " at " . $job['company'] . " (" . $job['start_date'] . " to " . $job['end_date'] . ")\n";
        }
        $this->response = $output;
    }

    public function render()
    {
        header('Content-Type: text');
        return $this->response;
    }
}
