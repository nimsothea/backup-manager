<?php namespace BigName\DatabaseBackup\Commands\Compression;

use BigName\DatabaseBackup\Commands\Command;
use BigName\DatabaseBackup\Compressors\Compressor;
use BigName\DatabaseBackup\ShellProcessing\ShellProcessor;

class DecompressFile implements Command
{
    private $sourcePath;
    /**
     * @var \BigName\DatabaseBackup\ShellProcessing\ShellProcessor
     */
    private $shellProcessor;
    /**
     * @var \BigName\DatabaseBackup\Compressors\Compressor
     */
    private $compressor;

    public function __construct(Compressor $compressor, $sourcePath, ShellProcessor $shellProcessor)
    {
        $this->sourcePath = $sourcePath;
        $this->shellProcessor = $shellProcessor;
        $this->compressor = $compressor;
    }

    public function execute()
    {
        return $this->shellProcessor->process($this->compressor->getDecompressCommandLine($this->sourcePath));
    }
}
