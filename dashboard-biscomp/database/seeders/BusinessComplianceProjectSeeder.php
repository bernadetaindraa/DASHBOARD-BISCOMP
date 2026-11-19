<?php

namespace Database\Seeders;

use App\Models\DocumentType;
use App\Models\Project;
use App\Models\ProjectPeriod;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BusinessComplianceProjectSeeder extends Seeder
{
    public function run(): void
    {
        // Import data source: 109 rows from the Business Compliance project recap.
        $rows = json_decode(<<<'JSON'
[
    {
        "row": 1,
        "group": "NGA",
        "customer": "PT Anugerah Bangun Bersama",
        "project_code": "ABB01JBA01BCLP2",
        "year": 2026,
        "ams": "Faisal",
        "start_date": "2026-02-01",
        "end_date": "2027-01-31",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": true,
            "GI": true,
            "RR": true,
            "PA": true,
            "PI": true,
            "KONTRAK": true,
            "BOQ": true
        }
    },
    {
        "row": 2,
        "group": "GA",
        "customer": "PT Aerofood Indonesia",
        "project_code": "ACS01CGK01BCAP1",
        "year": 2026,
        "ams": "",
        "start_date": "2026-02-01",
        "end_date": "2028-12-31",
        "project_status": "",
        "documents": {
            "PROPOSAL": false,
            "GI": false,
            "RR": false,
            "PA": false,
            "PI": false,
            "KONTRAK": true,
            "BOQ": false
        }
    },
    {
        "row": 3,
        "group": "GA",
        "customer": "PT Aerofood Indonesia",
        "project_code": "ACS08CGK01BCAP4",
        "year": 2026,
        "ams": "Faisal",
        "start_date": "2026-01-01",
        "end_date": "2028-12-31",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": true,
            "GI": true,
            "RR": true,
            "PA": false,
            "PI": true,
            "KONTRAK": true,
            "BOQ": true
        }
    },
    {
        "row": 4,
        "group": "GA",
        "customer": "PT Aero Globe Indonesia",
        "project_code": "AGI01ALL01BCAP1",
        "year": 2026,
        "ams": "Budi",
        "start_date": "2026-01-01",
        "end_date": "2026-12-27",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": true,
            "GI": true,
            "RR": true,
            "PA": true,
            "PI": true,
            "KONTRAK": true,
            "BOQ": true
        }
    },
    {
        "row": 5,
        "group": "GA",
        "customer": "PT Aero Globe Indonesia",
        "project_code": "AGI02ALL01BCAP1",
        "year": 2026,
        "ams": "Budi",
        "start_date": "2026-01-01",
        "end_date": "2026-12-27",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": true,
            "GI": true,
            "RR": true,
            "PA": true,
            "PI": true,
            "KONTRAK": true,
            "BOQ": true
        }
    },
    {
        "row": 6,
        "group": "NGA",
        "customer": "PT AICE Ice Cream Jatim Industry",
        "project_code": "AJI10ALL01BCAP2",
        "year": 2026,
        "ams": "Budi",
        "start_date": "2026-01-01",
        "end_date": "2026-03-31",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": true,
            "GI": true,
            "RR": true,
            "PA": true,
            "PI": true,
            "KONTRAK": true,
            "BOQ": true
        }
    },
    {
        "row": 7,
        "group": "NGA",
        "customer": "PT AICE Ice Cream Jatim Industry",
        "project_code": "AJI11ALL01BCAP2",
        "year": 2026,
        "ams": "Budi",
        "start_date": "2026-01-01",
        "end_date": "2026-03-31",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": true,
            "GI": true,
            "RR": true,
            "PA": true,
            "PI": false,
            "KONTRAK": true,
            "BOQ": true
        }
    },
    {
        "row": 8,
        "group": "NGA",
        "customer": "PT AICE Ice Cream Jatim Industry",
        "project_code": "AJI17ALL01BCAP2",
        "year": 2026,
        "ams": "Budi",
        "start_date": "2026-01-01",
        "end_date": "2026-03-31",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": true,
            "GI": false,
            "RR": true,
            "PA": false,
            "PI": false,
            "KONTRAK": true,
            "BOQ": true
        }
    },
    {
        "row": 9,
        "group": "NGA",
        "customer": "PT AICE Ice Cream Jatim Industry",
        "project_code": "AJI19ALL01BCAP2",
        "year": 2026,
        "ams": "Budi",
        "start_date": "2026-01-01",
        "end_date": "2026-03-31",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": false,
            "GI": true,
            "RR": true,
            "PA": false,
            "PI": false,
            "KONTRAK": true,
            "BOQ": true
        }
    },
    {
        "row": 10,
        "group": "NGA",
        "customer": "PT AICE Ice Cream Jatim Industry",
        "project_code": "AJI20JDB01BCAP2",
        "year": 2026,
        "ams": "Budi",
        "start_date": "2026-01-13",
        "end_date": "2026-04-12",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": true,
            "GI": false,
            "RR": true,
            "PA": true,
            "PI": false,
            "KONTRAK": true,
            "BOQ": true
        }
    },
    {
        "row": 11,
        "group": "GA",
        "customer": "PT Aero System Indonesia",
        "project_code": "ASY01CGK01BCAP1",
        "year": 2026,
        "ams": "Faisal",
        "start_date": "2026-04-01",
        "end_date": "2026-06-30",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": true,
            "GI": true,
            "RR": true,
            "PA": true,
            "PI": true,
            "KONTRAK": true,
            "BOQ": true
        }
    },
    {
        "row": 12,
        "group": "GA",
        "customer": "PT Aero System Indonesia",
        "project_code": "ASY02CGK01BCAP2",
        "year": 2026,
        "ams": "Faisal",
        "start_date": "2026-03-01",
        "end_date": "2027-02-28",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": true,
            "GI": true,
            "RR": true,
            "PA": true,
            "PI": true,
            "KONTRAK": true,
            "BOQ": true
        }
    },
    {
        "row": 13,
        "group": "NGA",
        "customer": "PT Baker Hughes Indonesia",
        "project_code": "BHI01BEK01BCLP2",
        "year": 2026,
        "ams": "Budi",
        "start_date": "2026-01-01",
        "end_date": "2026-09-30",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": true,
            "GI": true,
            "RR": true,
            "PA": true,
            "PI": true,
            "KONTRAK": true,
            "BOQ": true
        }
    },
    {
        "row": 14,
        "group": "NGA",
        "customer": "PT Baker Hughes Indonesia",
        "project_code": "BHI03PLM01BCLP2",
        "year": 2026,
        "ams": "Budi",
        "start_date": "2026-01-01",
        "end_date": "2026-09-30",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": true,
            "GI": true,
            "RR": false,
            "PA": true,
            "PI": true,
            "KONTRAK": true,
            "BOQ": true
        }
    },
    {
        "row": 15,
        "group": "NGA",
        "customer": "PT Baker Hughes Indonesia",
        "project_code": "BHI05CKD01BCLP2",
        "year": 2026,
        "ams": "Budi",
        "start_date": "2026-01-01",
        "end_date": "2026-09-30",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": true,
            "GI": true,
            "RR": false,
            "PA": true,
            "PI": true,
            "KONTRAK": true,
            "BOQ": true
        }
    },
    {
        "row": 16,
        "group": "NGA",
        "customer": "PT Bentoel Prima",
        "project_code": "BPR18ALL01BCAP2",
        "year": 2026,
        "ams": "Budi",
        "start_date": "2026-01-01",
        "end_date": "2026-02-28",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": true,
            "GI": false,
            "RR": false,
            "PA": false,
            "PI": false,
            "KONTRAK": true,
            "BOQ": true
        }
    },
    {
        "row": 17,
        "group": "NGA",
        "customer": "PT Bentoel Distributor Utama",
        "project_code": "BDU05ALL01BCAP2",
        "year": 2026,
        "ams": "Budi",
        "start_date": "2026-03-02",
        "end_date": "2026-04-02",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": true,
            "GI": false,
            "RR": false,
            "PA": false,
            "PI": false,
            "KONTRAK": true,
            "BOQ": true
        }
    },
    {
        "row": 18,
        "group": "GA",
        "customer": "PT GMF Aeroasia, Tbk.",
        "project_code": "GMF43CGK02BSKP1",
        "year": 2026,
        "ams": "Faisal",
        "start_date": "2026-03-01",
        "end_date": "2026-12-31",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": true,
            "GI": true,
            "RR": true,
            "PA": true,
            "PI": true,
            "KONTRAK": true,
            "BOQ": true
        }
    },
    {
        "row": 19,
        "group": "NGA",
        "customer": "PT Kopnuspos",
        "project_code": "KOP01ALL01BCLP2",
        "year": 2026,
        "ams": "Budi",
        "start_date": "2026-01-01",
        "end_date": "2026-12-31",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": true,
            "GI": true,
            "RR": true,
            "PA": true,
            "PI": true,
            "KONTRAK": true,
            "BOQ": true
        }
    },
    {
        "row": 20,
        "group": "NGA",
        "customer": "PT Kopnuspos",
        "project_code": "KOP02ALL01BSEP2",
        "year": 2026,
        "ams": "Budi",
        "start_date": "2026-01-01",
        "end_date": "2026-12-31",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": true,
            "GI": true,
            "RR": true,
            "PA": true,
            "PI": true,
            "KONTRAK": true,
            "BOQ": true
        }
    },
    {
        "row": 21,
        "group": "NGA",
        "customer": "PT Jalan-Jalan Nusantara",
        "project_code": "JJN02ALL01BSEP2",
        "year": 2026,
        "ams": "Budi",
        "start_date": "2026-02-01",
        "end_date": "2027-01-31",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": true,
            "GI": true,
            "RR": true,
            "PA": true,
            "PI": true,
            "KONTRAK": true,
            "BOQ": true
        }
    },
    {
        "row": 22,
        "group": "NGA",
        "customer": "PT Jalan-Jalan Nusantara",
        "project_code": "JJN03ALL01BCLP2",
        "year": 2026,
        "ams": "Budi",
        "start_date": "2026-01-01",
        "end_date": "2026-12-31",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": true,
            "GI": true,
            "RR": true,
            "PA": true,
            "PI": true,
            "KONTRAK": true,
            "BOQ": true
        }
    },
    {
        "row": 23,
        "group": "NGA",
        "customer": "PT Citra Multi Services",
        "project_code": "CMS01ALL01BCLP2",
        "year": 2026,
        "ams": "Budi",
        "start_date": "2026-01-01",
        "end_date": "2026-12-31",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": true,
            "GI": true,
            "RR": true,
            "PA": true,
            "PI": true,
            "KONTRAK": true,
            "BOQ": true
        }
    },
    {
        "row": 24,
        "group": "NGA",
        "customer": "PT Linfox Logistics Indonesia",
        "project_code": "LLI09CKR01BCAP2",
        "year": 2026,
        "ams": "Budi",
        "start_date": "2026-01-01",
        "end_date": "2026-12-31",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": true,
            "GI": true,
            "RR": false,
            "PA": true,
            "PI": true,
            "KONTRAK": true,
            "BOQ": true
        }
    },
    {
        "row": 25,
        "group": "NGA",
        "customer": "PT Linfox Logistics Indonesia",
        "project_code": "LLI10CKR01BCAP2",
        "year": 2026,
        "ams": "Budi",
        "start_date": "2026-01-01",
        "end_date": "2026-03-31",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": true,
            "GI": false,
            "RR": false,
            "PA": false,
            "PI": false,
            "KONTRAK": true,
            "BOQ": true
        }
    },
    {
        "row": 26,
        "group": "GA",
        "customer": "PT Citilink Indonesia",
        "project_code": "QGA01CGK02BCLP2",
        "year": 2026,
        "ams": "Faisal",
        "start_date": "2026-01-01",
        "end_date": "2026-12-31",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": true,
            "GI": true,
            "RR": true,
            "PA": true,
            "PI": true,
            "KONTRAK": true,
            "BOQ": true
        }
    },
    {
        "row": 27,
        "group": "NGA",
        "customer": "PT SGMW Motor Indonesia",
        "project_code": "SMI01BEK01BCLP2",
        "year": 2026,
        "ams": "Budi",
        "start_date": "2026-01-01",
        "end_date": "2026-12-31",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": true,
            "GI": true,
            "RR": true,
            "PA": true,
            "PI": true,
            "KONTRAK": true,
            "BOQ": true
        }
    },
    {
        "row": 28,
        "group": "NGA",
        "customer": "PT SGMW Motor Indonesia",
        "project_code": "SMI02BEK01BCLP2",
        "year": 2026,
        "ams": "Budi",
        "start_date": "2026-01-01",
        "end_date": "2026-12-31",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": true,
            "GI": true,
            "RR": true,
            "PA": true,
            "PI": true,
            "KONTRAK": true,
            "BOQ": true
        }
    },
    {
        "row": 29,
        "group": "NGA",
        "customer": "PT SGMW Motor Indonesia",
        "project_code": "SMI03BEK01BCLP2",
        "year": 2026,
        "ams": "Budi",
        "start_date": "2026-01-01",
        "end_date": "2026-12-31",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": true,
            "GI": true,
            "RR": true,
            "PA": true,
            "PI": true,
            "KONTRAK": true,
            "BOQ": true
        }
    },
    {
        "row": 30,
        "group": "NGA",
        "customer": "PT SGMW Sales Indonesia",
        "project_code": "SSI04JSE01BCLP2",
        "year": 2026,
        "ams": "Budi",
        "start_date": "2026-01-01",
        "end_date": "2026-12-31",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": true,
            "GI": true,
            "RR": true,
            "PA": true,
            "PI": true,
            "KONTRAK": true,
            "BOQ": true
        }
    },
    {
        "row": 31,
        "group": "NGA",
        "customer": "PT SGMW Motor Indonesia",
        "project_code": "SMI05BEK01BCLP2",
        "year": 2026,
        "ams": "Budi",
        "start_date": "2026-01-01",
        "end_date": "2026-12-31",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": true,
            "GI": true,
            "RR": true,
            "PA": true,
            "PI": true,
            "KONTRAK": true,
            "BOQ": true
        }
    },
    {
        "row": 32,
        "group": "NGA",
        "customer": "PT SGMW Motor Indonesia",
        "project_code": "SMI06BEK01BCLP2",
        "year": 2026,
        "ams": "Budi",
        "start_date": "2026-01-01",
        "end_date": "2026-12-31",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": true,
            "GI": true,
            "RR": true,
            "PA": true,
            "PI": true,
            "KONTRAK": true,
            "BOQ": true
        }
    },
    {
        "row": 33,
        "group": "NGA",
        "customer": "PT SAIC Internasional Indonesia",
        "project_code": "SII07BEK01BCLP2",
        "year": 2026,
        "ams": "Budi",
        "start_date": "2026-01-01",
        "end_date": "2026-12-31",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": true,
            "GI": true,
            "RR": true,
            "PA": true,
            "PI": true,
            "KONTRAK": true,
            "BOQ": true
        }
    },
    {
        "row": 34,
        "group": "NGA",
        "customer": "PT SGMW Sales Indonesia",
        "project_code": "SSI08JSE01BCLP2",
        "year": 2026,
        "ams": "Budi",
        "start_date": "2026-01-01",
        "end_date": "2026-12-31",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": true,
            "GI": true,
            "RR": true,
            "PA": true,
            "PI": false,
            "KONTRAK": true,
            "BOQ": true
        }
    },
    {
        "row": 35,
        "group": "NGA",
        "customer": "PT SAIC Internasional Indonesia",
        "project_code": "SII09BEK01BCLP2",
        "year": 2026,
        "ams": "Budi",
        "start_date": null,
        "end_date": null,
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": true,
            "GI": true,
            "RR": true,
            "PA": true,
            "PI": true,
            "KONTRAK": true,
            "BOQ": true
        }
    },
    {
        "row": 36,
        "group": "NGA",
        "customer": "PT Sabre Travel Network Indonesia",
        "project_code": "STN01JSE01BCLP1",
        "year": 2026,
        "ams": "Faisal",
        "start_date": "2025-03-01",
        "end_date": "2026-02-28",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": true,
            "GI": true,
            "RR": true,
            "PA": true,
            "PI": true,
            "KONTRAK": true,
            "BOQ": true
        }
    },
    {
        "row": 37,
        "group": "NGA",
        "customer": "PT Sabre Travel Network Indonesia",
        "project_code": "STN02JSE01BSEP1",
        "year": 2026,
        "ams": "Faisal",
        "start_date": "2026-03-01",
        "end_date": "2027-02-28",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": true,
            "GI": true,
            "RR": true,
            "PA": true,
            "PI": true,
            "KONTRAK": true,
            "BOQ": true
        }
    },
    {
        "row": 38,
        "group": "NGA",
        "customer": "PT Sabre Travel Network Indonesia",
        "project_code": "STN03SUB01BCAP1",
        "year": 2026,
        "ams": "Faisal",
        "start_date": "2025-09-01",
        "end_date": "2026-08-31",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": true,
            "GI": true,
            "RR": true,
            "PA": true,
            "PI": true,
            "KONTRAK": true,
            "BOQ": true
        }
    },
    {
        "row": 39,
        "group": "NGA",
        "customer": "Jakarta Praise Community Church",
        "project_code": "JPC01SLP02BFRP1",
        "year": 2026,
        "ams": "Faisal",
        "start_date": "2026-01-01",
        "end_date": "2026-12-31",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": true,
            "GI": true,
            "RR": true,
            "PA": true,
            "PI": true,
            "KONTRAK": true,
            "BOQ": true
        }
    },
    {
        "row": 40,
        "group": "NGA",
        "customer": "PLN Indonesia Power",
        "project_code": "PIP03JBA01BCAP2",
        "year": 2026,
        "ams": "Ais",
        "start_date": "2026-01-01",
        "end_date": "2026-06-30",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": true,
            "GI": true,
            "RR": true,
            "PA": true,
            "PI": true,
            "KONTRAK": true,
            "BOQ": true
        }
    },
    {
        "row": 41,
        "group": "NGA",
        "customer": "PT Griff Prima Abadi",
        "project_code": "GFP01ALL01BCAP2",
        "year": 2026,
        "ams": "Budi",
        "start_date": "2026-04-01",
        "end_date": "2026-06-30",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": true,
            "GI": true,
            "RR": true,
            "PA": true,
            "PI": true,
            "KONTRAK": true,
            "BOQ": true
        }
    },
    {
        "row": 42,
        "group": "NGA",
        "customer": "PT Agrinas Jaladri Nusantara",
        "project_code": "AJN02JSE01BSEP2",
        "year": 2026,
        "ams": "Budi",
        "start_date": "2026-01-01",
        "end_date": "2026-03-08",
        "project_status": "Tidak Aktif",
        "documents": {
            "PROPOSAL": true,
            "GI": true,
            "RR": true,
            "PA": true,
            "PI": true,
            "KONTRAK": true,
            "BOQ": true
        }
    },
    {
        "row": 43,
        "group": "NGA",
        "customer": "Koperasi Konsumen Karyawan Agrinas Jaladri Nusantara",
        "project_code": "KKK01JSE01BCLP2",
        "year": 2026,
        "ams": "Budi",
        "start_date": "2026-03-09",
        "end_date": "2026-08-08",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": true,
            "GI": true,
            "RR": true,
            "PA": true,
            "PI": true,
            "KONTRAK": true,
            "BOQ": true
        }
    },
    {
        "row": 44,
        "group": "NGA",
        "customer": "Koperasi Konsumen Karyawan Agrinas Jaladri Nusantara",
        "project_code": "KKK02JSE01BSEP2",
        "year": 2026,
        "ams": "Budi",
        "start_date": "2026-03-09",
        "end_date": "2026-08-08",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": true,
            "GI": true,
            "RR": true,
            "PA": true,
            "PI": true,
            "KONTRAK": true,
            "BOQ": true
        }
    },
    {
        "row": 45,
        "group": "NGA",
        "customer": "Keumseong LLC",
        "project_code": "KMG01ROK01BSKP2",
        "year": 2026,
        "ams": "Faisal",
        "start_date": null,
        "end_date": null,
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": true,
            "GI": true,
            "RR": true,
            "PA": true,
            "PI": true,
            "KONTRAK": true,
            "BOQ": true
        }
    },
    {
        "row": 46,
        "group": "NGA",
        "customer": "Regent Aerospace Corporation",
        "project_code": "RAC01SAU04BSKOT",
        "year": 2026,
        "ams": "Faisal",
        "start_date": null,
        "end_date": null,
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": true,
            "GI": false,
            "RR": true,
            "PA": false,
            "PI": true,
            "KONTRAK": true,
            "BOQ": true
        }
    },
    {
        "row": 47,
        "group": "NGA",
        "customer": "PT Siraj Badawi Cukup Rupiah",
        "project_code": "SBC01ALL01BCAP2",
        "year": 2026,
        "ams": "Budi",
        "start_date": "2026-02-01",
        "end_date": "2027-01-31",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": true,
            "GI": true,
            "RR": true,
            "PA": true,
            "PI": true,
            "KONTRAK": true,
            "BOQ": true
        }
    },
    {
        "row": 48,
        "group": "NGA",
        "customer": "PT Buku Usaha Digital (Buku Warung)",
        "project_code": "BUD01ALL01BCAP2",
        "year": 2026,
        "ams": "Budi",
        "start_date": "2026-02-01",
        "end_date": "2026-04-30",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": true,
            "GI": true,
            "RR": true,
            "PA": true,
            "PI": true,
            "KONTRAK": true,
            "BOQ": true
        }
    },
    {
        "row": 49,
        "group": "NGA",
        "customer": "PT Indo Mai Go",
        "project_code": "IMG01ALL01BCAP2",
        "year": 2026,
        "ams": "Budi",
        "start_date": null,
        "end_date": null,
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": true,
            "GI": true,
            "RR": true,
            "PA": true,
            "PI": true,
            "KONTRAK": true,
            "BOQ": true
        }
    },
    {
        "row": 50,
        "group": "NGA",
        "customer": "PT Wira Jasa Angkasa",
        "project_code": "WJA01HLP01BCAP1",
        "year": 2026,
        "ams": "Faisal",
        "start_date": "2026-04-15",
        "end_date": "2026-11-30",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": true,
            "GI": true,
            "RR": true,
            "PA": true,
            "PI": true,
            "KONTRAK": true,
            "BOQ": true
        }
    },
    {
        "row": 51,
        "group": "NGA",
        "customer": "PT Gerbang Edukasi Makmur",
        "project_code": "GEM03BDO01BCAP2",
        "year": 2026,
        "ams": "Budi",
        "start_date": "2026-01-31",
        "end_date": "2026-02-08",
        "project_status": "Tidak Aktif",
        "documents": {
            "PROPOSAL": true,
            "GI": false,
            "RR": false,
            "PA": false,
            "PI": false,
            "KONTRAK": true,
            "BOQ": true
        }
    },
    {
        "row": 52,
        "group": "NGA",
        "customer": "PT Acmic Electronic",
        "project_code": "AEC01ALL01BCAP2",
        "year": 2026,
        "ams": "Budi",
        "start_date": "2026-01-01",
        "end_date": "2026-12-31",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": true,
            "GI": true,
            "RR": true,
            "PA": true,
            "PI": true,
            "KONTRAK": true,
            "BOQ": true
        }
    },
    {
        "row": 53,
        "group": "NGA",
        "customer": "PT Garuda Indonesia",
        "project_code": "GIA06CGK01BCAP1",
        "year": 2026,
        "ams": "Faisal",
        "start_date": "2026-04-22",
        "end_date": "2026-04-27",
        "project_status": "Tidak Aktif",
        "documents": {
            "PROPOSAL": true,
            "GI": false,
            "RR": false,
            "PA": false,
            "PI": false,
            "KONTRAK": true,
            "BOQ": true
        }
    },
    {
        "row": 54,
        "group": "NGA",
        "customer": "PT Aneka Petroindo Raya",
        "project_code": "APR03ALLOTOTSOT",
        "year": 2026,
        "ams": "Ais",
        "start_date": "2026-05-13",
        "end_date": "2026-06-13",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": true,
            "GI": true,
            "RR": false,
            "PA": true,
            "PI": false,
            "KONTRAK": true,
            "BOQ": true
        }
    },
    {
        "row": 55,
        "group": "GA",
        "customer": "PT Aero Globe Indonesia",
        "project_code": "AGI07TBT01BCAP1",
        "year": 2026,
        "ams": "Faisal",
        "start_date": "2025-11-30",
        "end_date": "2026-03-31",
        "project_status": "Tidak Aktif",
        "documents": {
            "PROPOSAL": true,
            "GI": true,
            "RR": true,
            "PA": false,
            "PI": true,
            "KONTRAK": true,
            "BOQ": true
        }
    },
    {
        "row": 56,
        "group": "GA",
        "customer": "PT GMF Aeroasia, Tbk.",
        "project_code": "GMF35CGK02BCLP2",
        "year": 2026,
        "ams": "Faisal",
        "start_date": "2025-05-01",
        "end_date": "2028-04-30",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": false,
            "GI": true,
            "RR": true,
            "PA": true,
            "PI": true,
            "KONTRAK": true,
            "BOQ": true
        }
    },
    {
        "row": 57,
        "group": "NGA",
        "customer": "PT Griff Prima Abadi",
        "project_code": "GFP03ALL01BCAP2",
        "year": 2026,
        "ams": "Budi",
        "start_date": "2026-05-27",
        "end_date": "2026-06-02",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": true,
            "GI": true,
            "RR": true,
            "PA": true,
            "PI": true,
            "KONTRAK": true,
            "BOQ": true
        }
    },
    {
        "row": 58,
        "group": "NGA",
        "customer": "PT Anugerah Bangun Bersama",
        "project_code": "ABB02JBA01BCLP2",
        "year": 2026,
        "ams": "Faisal",
        "start_date": "2026-02-01",
        "end_date": "2027-01-31",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": true,
            "GI": true,
            "RR": true,
            "PA": true,
            "PI": true,
            "KONTRAK": true,
            "BOQ": true
        }
    },
    {
        "row": 59,
        "group": "NGA",
        "customer": "PT Linfox Logistics Indonesia",
        "project_code": "LLI02CKR01BCLP2",
        "year": 2026,
        "ams": "Budi",
        "start_date": "2026-04-01",
        "end_date": "2027-03-31",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": true,
            "GI": true,
            "RR": false,
            "PA": true,
            "PI": true,
            "KONTRAK": true,
            "BOQ": true
        }
    },
    {
        "row": 60,
        "group": "NGA",
        "customer": "PT Krayon Konsultan Indo",
        "project_code": "CKI01JDB01BCAP1",
        "year": 2026,
        "ams": "Budi",
        "start_date": "2026-05-01",
        "end_date": "2027-04-30",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": true,
            "GI": true,
            "RR": true,
            "PA": true,
            "PI": true,
            "KONTRAK": true,
            "BOQ": true
        }
    },
    {
        "row": 61,
        "group": "NGA",
        "customer": "PT Aerojasa Cargo",
        "project_code": "AJC02ALL01BCAP1",
        "year": 2026,
        "ams": "Budi",
        "start_date": "2026-06-01",
        "end_date": "2027-05-31",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": true,
            "GI": true,
            "RR": false,
            "PA": true,
            "PI": true,
            "KONTRAK": true,
            "BOQ": true
        }
    },
    {
        "row": 62,
        "group": "NGA",
        "customer": "PT Aneka Petroindo Raya",
        "project_code": "APR03ALLOTOTSOT",
        "year": 2026,
        "ams": "Ais",
        "start_date": "2026-06-01",
        "end_date": "2026-06-30",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": false,
            "GI": true,
            "RR": false,
            "PA": true,
            "PI": true,
            "KONTRAK": false,
            "BOQ": false
        }
    },
    {
        "row": 63,
        "group": "NGA",
        "customer": "PT Aneka Petroindo Raya",
        "project_code": "APR01ALL01BCAP2",
        "year": 2026,
        "ams": "Ais",
        "start_date": "2026-07-01",
        "end_date": "2027-06-30",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": true,
            "GI": true,
            "RR": true,
            "PA": true,
            "PI": true,
            "KONTRAK": true,
            "BOQ": true
        }
    },
    {
        "row": 64,
        "group": "NGA",
        "customer": "PT Braja Mukti Cakra",
        "project_code": "BMC01BEK01BCLP2",
        "year": 2026,
        "ams": "Ais",
        "start_date": "2026-02-01",
        "end_date": "2026-12-31",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": true,
            "GI": true,
            "RR": true,
            "PA": true,
            "PI": true,
            "KONTRAK": true,
            "BOQ": true
        }
    },
    {
        "row": 65,
        "group": "NGA",
        "customer": "PT Linfox Logistics Indonesia",
        "project_code": "LLI03JSE01BCLP2",
        "year": 2026,
        "ams": "Budi",
        "start_date": "2026-04-01",
        "end_date": "2027-03-31",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": true,
            "GI": true,
            "RR": false,
            "PA": true,
            "PI": true,
            "KONTRAK": true,
            "BOQ": true
        }
    },
    {
        "row": 66,
        "group": "NGA",
        "customer": "PT Linfox Logistics Indonesia",
        "project_code": "LLI05CKR01BCAP2",
        "year": 2026,
        "ams": "Budi",
        "start_date": "2026-04-01",
        "end_date": "2027-03-31",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": true,
            "GI": true,
            "RR": false,
            "PA": true,
            "PI": true,
            "KONTRAK": true,
            "BOQ": true
        }
    },
    {
        "row": 67,
        "group": "NGA",
        "customer": "PT Linfox Logistics Indonesia",
        "project_code": "LLI06CKR01BCAP2",
        "year": 2026,
        "ams": "Budi",
        "start_date": "2026-04-01",
        "end_date": "2026-12-31",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": true,
            "GI": true,
            "RR": false,
            "PA": true,
            "PI": true,
            "KONTRAK": true,
            "BOQ": true
        }
    },
    {
        "row": 68,
        "group": "NGA",
        "customer": "PT Linfox Logistics Indonesia",
        "project_code": "LLI01CKR01BCLP2",
        "year": 2026,
        "ams": "Budi",
        "start_date": "2026-04-01",
        "end_date": "2027-03-31",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": true,
            "GI": false,
            "RR": false,
            "PA": true,
            "PI": true,
            "KONTRAK": true,
            "BOQ": true
        }
    },
    {
        "row": 69,
        "group": "NGA",
        "customer": "PT Linfox Logistics Indonesia",
        "project_code": "LLI07CKR02BCAP2",
        "year": 2026,
        "ams": "Budi",
        "start_date": "2026-05-01",
        "end_date": "2027-12-31",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": true,
            "GI": true,
            "RR": false,
            "PA": false,
            "PI": true,
            "KONTRAK": true,
            "BOQ": true
        }
    },
    {
        "row": 70,
        "group": "NGA",
        "customer": "PT Pos Logistik Indonesia",
        "project_code": "PLI02TNG01BSEP2",
        "year": 2026,
        "ams": "Budi",
        "start_date": "2026-06-01",
        "end_date": "2027-05-31",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": true,
            "GI": true,
            "RR": true,
            "PA": true,
            "PI": true,
            "KONTRAK": true,
            "BOQ": true
        }
    },
    {
        "row": 71,
        "group": "NGA",
        "customer": "PT Andalan Samudera Megatrans",
        "project_code": "ASM01PLM01BCAP2",
        "year": 2026,
        "ams": "Budi",
        "start_date": "2026-07-25",
        "end_date": "2027-07-24",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": true,
            "GI": true,
            "RR": true,
            "PA": true,
            "PI": true,
            "KONTRAK": true,
            "BOQ": true
        }
    },
    {
        "row": 72,
        "group": "NGA",
        "customer": "PT Multi Terminal Indonesia",
        "project_code": "MTI03TNG01BSEP2",
        "year": 2026,
        "ams": "Budi",
        "start_date": "2026-07-01",
        "end_date": "2027-05-31",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": false,
            "GI": true,
            "RR": false,
            "PA": true,
            "PI": true,
            "KONTRAK": true,
            "BOQ": true
        }
    },
    {
        "row": 73,
        "group": "NGA",
        "customer": "PT PLN Indonesia Power",
        "project_code": "PIP04JBA01BCAP2",
        "year": 2026,
        "ams": "Ais",
        "start_date": "2026-07-01",
        "end_date": "2026-12-31",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": true,
            "GI": true,
            "RR": true,
            "PA": true,
            "PI": true,
            "KONTRAK": true,
            "BOQ": true
        }
    },
    {
        "row": 74,
        "group": "GA",
        "customer": "PT Aerofood Indonesia",
        "project_code": "ACS04CGK01BCAP2",
        "year": 2026,
        "ams": "Faisal",
        "start_date": "2026-02-01",
        "end_date": "2028-01-31",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": false,
            "GI": true,
            "RR": true,
            "PA": false,
            "PI": true,
            "KONTRAK": true,
            "BOQ": true
        }
    },
    {
        "row": 75,
        "group": "GA",
        "customer": "PT Aerofood Indonesia",
        "project_code": "ACS02CGK01BSEP2",
        "year": 2026,
        "ams": "Faisal",
        "start_date": "2026-02-01",
        "end_date": "2028-01-31",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": false,
            "GI": true,
            "RR": true,
            "PA": true,
            "PI": true,
            "KONTRAK": true,
            "BOQ": true
        }
    },
    {
        "row": 76,
        "group": "GA",
        "customer": "PT Aerofood Indonesia",
        "project_code": "ACS05SUB01BSEP2",
        "year": 2026,
        "ams": "Faisal",
        "start_date": "2026-02-01",
        "end_date": "2028-01-31",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": false,
            "GI": false,
            "RR": true,
            "PA": false,
            "PI": false,
            "KONTRAK": false,
            "BOQ": false
        }
    },
    {
        "row": 77,
        "group": "NGA",
        "customer": "PT XL Smart Telecom Sejahtera",
        "project_code": "STE01ALL01BCAP2",
        "year": 2026,
        "ams": "Budi",
        "start_date": "2026-08-01",
        "end_date": "2027-07-31",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": true,
            "GI": true,
            "RR": true,
            "PA": true,
            "PI": true,
            "KONTRAK": true,
            "BOQ": true
        }
    },
    {
        "row": 78,
        "group": "NGA",
        "customer": "PT Griff Prima Abadi",
        "project_code": "GFP01ALL01BCAP2",
        "year": 2026,
        "ams": "Budi",
        "start_date": "2026-07-01",
        "end_date": "2026-12-31",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": true,
            "GI": true,
            "RR": false,
            "PA": true,
            "PI": true,
            "KONTRAK": true,
            "BOQ": true
        }
    },
    {
        "row": 79,
        "group": "NGA",
        "customer": "PT Kalista Biru Nusantara",
        "project_code": "KBI03MED01BCAP2",
        "year": 2026,
        "ams": "",
        "start_date": "2026-08-05",
        "end_date": "2027-08-04",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": true,
            "GI": true,
            "RR": true,
            "PA": true,
            "PI": true,
            "KONTRAK": true,
            "BOQ": true
        }
    },
    {
        "row": 80,
        "group": "NGA",
        "customer": "PT Kalista Soter Hastia",
        "project_code": "KSH01JTI01BCAP2",
        "year": 2026,
        "ams": "",
        "start_date": "2026-08-05",
        "end_date": "2027-08-04",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": true,
            "GI": true,
            "RR": true,
            "PA": true,
            "PI": true,
            "KONTRAK": true,
            "BOQ": true
        }
    },
    {
        "row": 81,
        "group": "NGA",
        "customer": "PT Kalista Soter Hastia",
        "project_code": "KSH02IKN01BCAP2",
        "year": 2026,
        "ams": "",
        "start_date": "2026-08-05",
        "end_date": "2027-08-04",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": true,
            "GI": true,
            "RR": true,
            "PA": true,
            "PI": true,
            "KONTRAK": true,
            "BOQ": true
        }
    },
    {
        "row": 82,
        "group": "NGA",
        "customer": "PT Kalista Soter Hastia",
        "project_code": "KSH05PKU01BCAP2",
        "year": 2026,
        "ams": "",
        "start_date": "2026-08-05",
        "end_date": "2027-08-04",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": true,
            "GI": true,
            "RR": true,
            "PA": true,
            "PI": true,
            "KONTRAK": true,
            "BOQ": true
        }
    },
    {
        "row": 83,
        "group": "NGA",
        "customer": "PT Bahtera Adi Jaya",
        "project_code": "BAJ01TNG01BCLP2",
        "year": 2026,
        "ams": "Ais",
        "start_date": "2026-09-17",
        "end_date": "2026-09-19",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": true,
            "GI": true,
            "RR": true,
            "PA": true,
            "PI": true,
            "KONTRAK": true,
            "BOQ": true
        }
    },
    {
        "row": 84,
        "group": "NGA",
        "customer": "PT Cablenet Fiber Data",
        "project_code": "CFD01ALL01BCAP2",
        "year": 2026,
        "ams": "",
        "start_date": "2026-09-15",
        "end_date": "2027-09-14",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": true,
            "GI": true,
            "RR": true,
            "PA": true,
            "PI": true,
            "KONTRAK": true,
            "BOQ": true
        }
    },
    {
        "row": 85,
        "group": "GA",
        "customer": "PT Aerofood Indonesia",
        "project_code": "ACS09CGK01BCAP1",
        "year": 2026,
        "ams": "Faisal",
        "start_date": "2026-09-01",
        "end_date": "2027-07-31",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": false,
            "GI": true,
            "RR": true,
            "PA": false,
            "PI": true,
            "KONTRAK": true,
            "BOQ": false
        }
    },
    {
        "row": 86,
        "group": "NGA",
        "customer": "PT Float Oat Indonesia",
        "project_code": "FOI01ALL01BCAP2",
        "year": 2026,
        "ams": "",
        "start_date": "2026-10-15",
        "end_date": "2026-11-06",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": true,
            "GI": true,
            "RR": true,
            "PA": true,
            "PI": true,
            "KONTRAK": true,
            "BOQ": true
        }
    },
    {
        "row": 87,
        "group": "NGA",
        "customer": "Baker Hughes Indonesia",
        "project_code": "BHI01BEK01BCLP2",
        "year": 2026,
        "ams": "",
        "start_date": "2026-10-01",
        "end_date": "2027-09-30",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": true,
            "GI": true,
            "RR": true,
            "PA": true,
            "PI": true,
            "KONTRAK": true,
            "BOQ": true
        }
    },
    {
        "row": 88,
        "group": "NGA",
        "customer": "Baker Hughes Indonesia",
        "project_code": "BHI03PLM01BCLP2",
        "year": 2026,
        "ams": "",
        "start_date": "2026-10-01",
        "end_date": "2027-09-30",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": true,
            "GI": true,
            "RR": true,
            "PA": true,
            "PI": true,
            "KONTRAK": true,
            "BOQ": true
        }
    },
    {
        "row": 89,
        "group": "NGA",
        "customer": "Baker Hughes Indonesia",
        "project_code": "BHI05CKD01BCLP2",
        "year": 2026,
        "ams": "",
        "start_date": "2026-10-01",
        "end_date": "2027-09-30",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": true,
            "GI": true,
            "RR": true,
            "PA": true,
            "PI": true,
            "KONTRAK": true,
            "BOQ": true
        }
    },
    {
        "row": 90,
        "group": "NGA",
        "customer": "PT Griff Prima Abadi",
        "project_code": "GFP03ALL01BCAP2",
        "year": 2026,
        "ams": "Budi",
        "start_date": "2026-10-14",
        "end_date": "2026-10-18",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": false,
            "GI": true,
            "RR": true,
            "PA": true,
            "PI": true,
            "KONTRAK": true,
            "BOQ": false
        }
    },
    {
        "row": 91,
        "group": "NGA",
        "customer": "PT Dassault Aviation Indonesia",
        "project_code": "DAI01JSE01BCAP2",
        "year": 2026,
        "ams": "",
        "start_date": "2026-10-28",
        "end_date": "2027-04-27",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": false,
            "GI": true,
            "RR": true,
            "PA": true,
            "PI": true,
            "KONTRAK": false,
            "BOQ": false
        }
    },
    {
        "row": 92,
        "group": "NGA",
        "customer": "PT Bahtera Adi Jaya",
        "project_code": "BAJ02TNG01BCLP2",
        "year": 2026,
        "ams": "",
        "start_date": "2026-10-19",
        "end_date": "2026-10-25",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": false,
            "GI": true,
            "RR": true,
            "PA": true,
            "PI": true,
            "KONTRAK": false,
            "BOQ": false
        }
    },
    {
        "row": 93,
        "group": "NGA",
        "customer": "PT Ekspres Transportasi Antarbenua",
        "project_code": "ETA01HLP01BCAP1",
        "year": 2026,
        "ams": "",
        "start_date": "2026-10-01",
        "end_date": "2027-09-30",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": false,
            "GI": true,
            "RR": true,
            "PA": false,
            "PI": true,
            "KONTRAK": false,
            "BOQ": false
        }
    },
    {
        "row": 94,
        "group": "NGA",
        "customer": "PT Wira Adirajasa Dirgantara",
        "project_code": "WAD01HLP01BCAP1",
        "year": 2026,
        "ams": "",
        "start_date": "2026-10-01",
        "end_date": "2027-09-30",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": false,
            "GI": true,
            "RR": true,
            "PA": true,
            "PI": true,
            "KONTRAK": false,
            "BOQ": false
        }
    },
    {
        "row": 95,
        "group": "NGA",
        "customer": "PT Wira Jasa Angkasa",
        "project_code": "WJA01HLP01BCAP1",
        "year": 2026,
        "ams": "",
        "start_date": "2026-04-15",
        "end_date": "2027-09-30",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": false,
            "GI": true,
            "RR": true,
            "PA": false,
            "PI": true,
            "KONTRAK": false,
            "BOQ": false
        }
    },
    {
        "row": 96,
        "group": "NGA",
        "customer": "PT Griff Prima Abadi",
        "project_code": "GFP03ALL01BCAP2",
        "year": 2026,
        "ams": "",
        "start_date": "2026-11-06",
        "end_date": "2026-11-08",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": false,
            "GI": true,
            "RR": true,
            "PA": false,
            "PI": false,
            "KONTRAK": false,
            "BOQ": false
        }
    },
    {
        "row": 97,
        "group": "NGA",
        "customer": "PT Griff Prima Abadi",
        "project_code": "GFP03ALL01BCAP2",
        "year": 2026,
        "ams": "",
        "start_date": "2026-01-01",
        "end_date": "2026-12-31",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": false,
            "GI": false,
            "RR": true,
            "PA": false,
            "PI": false,
            "KONTRAK": false,
            "BOQ": false
        }
    },
    {
        "row": 98,
        "group": "GA",
        "customer": "PT GMF Aeroasia, Tbk.",
        "project_code": "GMF45CGK01BCAP2",
        "year": 2026,
        "ams": "Faisal",
        "start_date": "2026-11-01",
        "end_date": "2026-12-31",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": false,
            "GI": true,
            "RR": true,
            "PA": false,
            "PI": false,
            "KONTRAK": false,
            "BOQ": false
        }
    },
    {
        "row": 99,
        "group": "NGA",
        "customer": "PT Kalista Soter Hastia",
        "project_code": "KSH05DEP01BCAP2",
        "year": 2026,
        "ams": "",
        "start_date": "2026-10-23",
        "end_date": "2026-12-31",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": false,
            "GI": true,
            "RR": true,
            "PA": false,
            "PI": true,
            "KONTRAK": false,
            "BOQ": false
        }
    },
    {
        "row": 100,
        "group": "NGA",
        "customer": "PT Kalista Soter Hastia",
        "project_code": "KSH06TGS01BCAP2",
        "year": 2026,
        "ams": "",
        "start_date": "2026-10-26",
        "end_date": "2026-11-25",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": false,
            "GI": true,
            "RR": true,
            "PA": false,
            "PI": true,
            "KONTRAK": false,
            "BOQ": false
        }
    },
    {
        "row": 101,
        "group": "NGA",
        "customer": "Koperasi Konsumen Karyawan Agrinas Jaladri Nusantara",
        "project_code": "KKK01JSE01BCLP2",
        "year": 2026,
        "ams": "",
        "start_date": "2026-08-09",
        "end_date": "2027-08-08",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": false,
            "GI": true,
            "RR": true,
            "PA": false,
            "PI": true,
            "KONTRAK": false,
            "BOQ": false
        }
    },
    {
        "row": 102,
        "group": "NGA",
        "customer": "Koperasi Konsumen Karyawan Agrinas Jaladri Nusantara",
        "project_code": "KKK02JSE01BSEP2",
        "year": 2026,
        "ams": "",
        "start_date": "2026-08-09",
        "end_date": "2027-08-08",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": false,
            "GI": true,
            "RR": true,
            "PA": false,
            "PI": true,
            "KONTRAK": false,
            "BOQ": false
        }
    },
    {
        "row": 103,
        "group": "GA",
        "customer": "PT Aerofood Indonesia",
        "project_code": "ACS06CGK01BCAP2",
        "year": 2026,
        "ams": "Faisal",
        "start_date": "2025-02-01",
        "end_date": "2028-01-31",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": false,
            "GI": false,
            "RR": false,
            "PA": false,
            "PI": false,
            "KONTRAK": false,
            "BOQ": false
        }
    },
    {
        "row": 104,
        "group": "GA",
        "customer": "PT Aerofood Indonesia",
        "project_code": "ACS06CGK01BCAP2",
        "year": 2026,
        "ams": "Faisal",
        "start_date": "2026-02-01",
        "end_date": "2028-01-31",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": false,
            "GI": true,
            "RR": true,
            "PA": false,
            "PI": true,
            "KONTRAK": false,
            "BOQ": false
        }
    },
    {
        "row": 105,
        "group": "GA",
        "customer": "PT Aerowisata",
        "project_code": "AWS01ALL01BCAP1",
        "year": 2026,
        "ams": "",
        "start_date": "2026-08-29",
        "end_date": "2026-09-30",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": false,
            "GI": false,
            "RR": false,
            "PA": true,
            "PI": false,
            "KONTRAK": false,
            "BOQ": false
        }
    },
    {
        "row": 106,
        "group": "GA",
        "customer": "PT GMF Aeroasia, Tbk.",
        "project_code": "GMF12CGK01BSKP2",
        "year": 2026,
        "ams": "Faisal",
        "start_date": "2026-01-10",
        "end_date": "2027-01-04",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": false,
            "GI": false,
            "RR": false,
            "PA": false,
            "PI": false,
            "KONTRAK": false,
            "BOQ": false
        }
    },
    {
        "row": 107,
        "group": "GA",
        "customer": "PT GMF Aeroasia, Tbk.",
        "project_code": "GMF46CGK02BSKP2",
        "year": 2026,
        "ams": "Faisal",
        "start_date": "2026-01-11",
        "end_date": "2026-12-31",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": false,
            "GI": false,
            "RR": false,
            "PA": false,
            "PI": false,
            "KONTRAK": false,
            "BOQ": false
        }
    },
    {
        "row": 108,
        "group": "NGA",
        "customer": "PT Bakrie Autoparts",
        "project_code": "BAP01BEK01BCLP2",
        "year": 2026,
        "ams": "",
        "start_date": "2026-01-11",
        "end_date": "2027-10-27",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": false,
            "GI": false,
            "RR": false,
            "PA": false,
            "PI": false,
            "KONTRAK": false,
            "BOQ": false
        }
    },
    {
        "row": 109,
        "group": "NGA",
        "customer": "PT Kalista Mobilitas Indonesia",
        "project_code": "KMI07DEP01BCAP2",
        "year": 2026,
        "ams": "",
        "start_date": "2026-10-23",
        "end_date": "2026-12-31",
        "project_status": "Aktif",
        "documents": {
            "PROPOSAL": false,
            "GI": false,
            "RR": false,
            "PA": false,
            "PI": false,
            "KONTRAK": false,
            "BOQ": false
        }
    }
]
JSON, true, 512, JSON_THROW_ON_ERROR);

        // Urutkan per project code dan tanggal mulai agar period_number mengikuti kronologi.
        usort($rows, function ($a, $b) {
            $codeComparison = strcmp($a['project_code'], $b['project_code']);

            if ($codeComparison !== 0) {
                return $codeComparison;
            }

            $dateA = $a['start_date'] ?? '9999-12-31';
            $dateB = $b['start_date'] ?? '9999-12-31';

            return strcmp($dateA, $dateB) ?: ($a['row'] <=> $b['row']);
        });

        $documentTypes = DocumentType::query()
            ->whereIn('code', ['PROPOSAL', 'GI', 'RR', 'PA', 'PI', 'KONTRAK', 'BOQ'])
            ->get()
            ->keyBy('code');

        $missingTypes = array_diff(
            ['PROPOSAL', 'GI', 'RR', 'PA', 'PI', 'KONTRAK', 'BOQ'],
            $documentTypes->keys()->all()
        );

        if (! empty($missingTypes)) {
            throw new \RuntimeException('Document type belum tersedia: '.implode(', ', $missingTypes));
        }

        // Cache AMS users. Nama harus cocok dengan kolom users.name.
        $amsUsers = User::query()->get()->keyBy(fn ($user) => mb_strtolower(trim($user->name)));
        $periodCounters = [];

        DB::transaction(function () use ($rows, $documentTypes, $amsUsers, &$periodCounters) {
            foreach ($rows as $row) {
                $projectCode = trim($row['project_code']);

                if ($projectCode === '') {
                    continue;
                }

                // Satu project code = satu project utama. Nama customer dari baris pertama dipertahankan.
                $project = Project::firstOrCreate(
                    ['project_code' => $projectCode],
                    [
                        'group_name' => $row['group'] !== '' ? $row['group'] : null,
                        'customer_name' => $row['customer'],
                    ]
                );

                $periodCounters[$projectCode] = ($periodCounters[$projectCode] ?? 0) + 1;
                $periodNumber = $periodCounters[$projectCode];

                $amsName = trim($row['ams']);
                $amsUser = $amsName !== ''
                    ? $amsUsers->get(mb_strtolower($amsName))
                    : null;

                $periodStatus = mb_strtolower(trim($row['project_status'])) === 'tidak aktif'
                    ? 'inactive'
                    : 'active';

                $period = ProjectPeriod::updateOrCreate(
                    [
                        'project_id' => $project->id,
                        'period_number' => $periodNumber,
                    ],
                    [
                        'year_entered' => $row['year'],
                        'ams_user_id' => $amsUser?->id,
                        'start_date' => $row['start_date'],
                        'end_date' => $row['end_date'],
                        'status' => $periodStatus,
                    ]
                );

                // Event ProjectPeriod::created membuat checklist awal; bagian ini mengisi status dari Excel.
                foreach ($row['documents'] as $documentCode => $isVerified) {
                    $documentType = $documentTypes->get($documentCode);

                    DB::table('project_period_documents')->updateOrInsert(
                        [
                            'project_period_id' => $period->id,
                            'document_type_id' => $documentType->id,
                        ],
                        [
                            'status' => $isVerified ? 'verified' : 'not_uploaded',
                            'current_evidence_id' => null,
                            'updated_at' => now(),
                            'created_at' => $period->created_at ?? now(),
                        ]
                    );
                }
            }
        });

        $this->command?->info('Business Compliance projects berhasil di-import: '.count($rows).' baris sumber.');
    }
}
