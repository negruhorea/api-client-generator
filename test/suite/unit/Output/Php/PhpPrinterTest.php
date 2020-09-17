<?php declare(strict_types=1);

namespace DoclerLabs\ApiClientGenerator\Test\Unit\Output\Php;

use ArrayIterator;
use DoclerLabs\ApiClientGenerator\Output\Php\PhpCodeStyleFixer;
use DoclerLabs\ApiClientGenerator\Output\Php\PhpFile;
use DoclerLabs\ApiClientGenerator\Output\Php\PhpFileCollection;
use DoclerLabs\ApiClientGenerator\Output\PhpFilePrinter;
use DoclerLabs\ApiClientGenerator\Output\TextFilePrinter;
use PhpParser\PrettyPrinterAbstract;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass \DoclerLabs\ApiClientGenerator\Output\PhpFilePrinter
 */
class PhpPrinterTest extends TestCase
{
    /** @var \DoclerLabs\ApiClientGenerator\Output\PhpFilePrinter */
    private $sut;
    /** @var PrettyPrinterAbstract|MockObject */
    private $marshaler;
    /** @var TextFilePrinter|MockObject */
    private $printer;
    /** @var PhpCodeStyleFixer|MockObject */
    private $fixer;

    public function setUp(): void
    {
        $this->marshaler = $this->createMock(PrettyPrinterAbstract::class);
        $this->printer   = $this->createMock(TextFilePrinter::class);
        $this->fixer     = $this->createMock(PhpCodeStyleFixer::class);

        $this->sut = new PhpFilePrinter($this->marshaler, $this->printer, $this->fixer);
    }

    public function testCreateFiles()
    {
        $fileRegistry = $this->createMock(PhpFileCollection::class);
        $file         = $this->createMock(PhpFile::class);
        $file->expects(self::once())
            ->method('getNodes');

        $fileRegistry
            ->expects(self::once())
            ->method('getIterator')
            ->willReturn(new ArrayIterator([$file]));

        $this->marshaler->expects(self::once())
            ->method('prettyPrintFile');
        $this->printer->expects(self::once())
            ->method('print');
        $this->fixer->expects(self::once())
            ->method('fix');

        $this->sut->print($fileRegistry);
    }
}