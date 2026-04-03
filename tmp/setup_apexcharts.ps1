$sourcePath = "C:\Users\pc\.gemini\antigravity\brain\2390a8da-5a89-4f4d-bcaa-2460ca21738a\.system_generated\steps\1634\content.md"
$targetPath = "c:\laragon\www\ptc-system\public\assets\dashbaord\vendors\js\charts\apexcharts.min.js"
$content = Get-Content -Path $sourcePath -Raw
# إزالة المقدمة (Header) من الملف
$content = $content -replace "^Source:.*`r?`n`r?`n---`r?`n`r?`n", ""
[IO.File]::WriteAllText($targetPath, $content)

# حذف ملفات Chartist
$chartistPaths = @(
    "c:\laragon\www\ptc-system\public\assets\dashbaord\vendors\js\charts\chartist.min.js",
    "c:\laragon\www\ptc-system\public\assets\dashbaord\vendors\js\charts\chartist-plugin-tooltip.min.js",
    "c:\laragon\www\ptc-system\public\assets\dashbaord\vendors\js\charts\chartist.css"
)

foreach ($path in $chartistPaths) {
    if (Test-Path $path) {
        Remove-Item $path -Force
    }
}
